<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $perPage = 16;
        
        // Get products query
        $query = Product::with(['category'])
            ->where('status', 'active')
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc');
        
        // Filter by category if specified
        if ($category && $category !== 'all') {
            $query->whereHas('category', function($q) use ($category) {
                $q->where('slug', $category);
            });
        }
        
        // Paginate products
        $products = $query->paginate($perPage);
        
        // Get statistics
        $totalProducts = Product::where('status', 'active')->count();
        $categoriesCount = Category::where('status', 'active')->count();
        
        // Get category data for JavaScript
        $categoryData = $this->getCategoryData();
        
        return view('shop.index', compact(
            'products',
            'totalProducts',
            'categoriesCount',
            'categoryData',
            'category'
        ));
    }
    
    public function all(Request $request)
    {
        $perPage = 24; // Show more products on "all" page
        
        $products = Product::with(['category'])
            ->where('status', 'active')
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
        
        $totalProducts = Product::where('status', 'active')->count();
        $categoriesCount = Category::where('status', 'active')->count();
        
        return view('shop.all', compact(
            'products',
            'totalProducts',
            'categoriesCount'
        ));
    }
    
    public function categories()
    {
        $categories = Category::with(['products' => function($query) {
            $query->where('status', 'active')->limit(4);
        }])
        ->where('status', 'active')
        ->withCount(['products' => function($query) {
            $query->where('status', 'active');
        }])
        ->orderBy('name')
        ->get();
        
        return view('shop.categories', compact('categories'));
    }
    
    public function show(Product $product)
    {
        // Load related products from the same category
        $relatedProducts = Product::with(['category'])
            ->where('status', 'active')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
        
        // If not enough related products, get random products
        if ($relatedProducts->count() < 4) {
            $additionalProducts = Product::with(['category'])
                ->where('status', 'active')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->inRandomOrder()
                ->limit(4 - $relatedProducts->count())
                ->get();
            
            $relatedProducts = $relatedProducts->concat($additionalProducts);
        }
        
        return view('shop.product', compact('product', 'relatedProducts'));
    }
    
    public function addToCart(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        
        // Get cart from session
        $cart = session()->get('cart', []);
        
        // Check if product already exists in cart
        $isAlreadyInCart = isset($cart[$product->id]);
        
        // If product already exists in cart, update quantity
        if ($isAlreadyInCart) {
            $cart[$product->id]['quantity'] += $quantity;
            $message = 'Cart updated! Quantity increased to ' . $cart[$product->id]['quantity'];
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => $quantity,
                'category' => $product->category->name ?? 'Product'
            ];
            $message = 'Product added to cart successfully!';
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'already_in_cart' => $isAlreadyInCart,
            'new_quantity' => $cart[$product->id]['quantity']
        ]);
    }
    
    public function updateCart(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$product->id])) {
            if ($quantity <= 0) {
                unset($cart[$product->id]);
            } else {
                $cart[$product->id]['quantity'] = $quantity;
            }
            
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
                'cart_count' => array_sum(array_column($cart, 'quantity'))
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart'
        ], 404);
    }
    
    public function removeFromCart(Product $product)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart successfully!',
                'cart_count' => array_sum(array_column($cart, 'quantity'))
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart'
        ], 404);
    }
    
    public function getCartData()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return response()->json([
            'items' => array_values($cart),
            'total' => $total,
            'count' => array_sum(array_column($cart, 'quantity'))
        ]);
    }
    
    public function checkCartStatus(Product $product)
    {
        $cart = session()->get('cart', []);
        $isInCart = isset($cart[$product->id]);
        $quantity = $isInCart ? $cart[$product->id]['quantity'] : 0;
        
        return response()->json([
            'in_cart' => $isInCart,
            'quantity' => $quantity
        ]);
    }
    
    private function getCategoryData()
    {
        $categories = Category::withCount(['products' => function($query) {
            $query->where('status', 'active');
        }])->where('status', 'active')->get();
        
        $categoryData = [
            'all' => [
                'total' => Product::where('status', 'active')->count(),
                'pages' => ceil(Product::where('status', 'active')->count() / 16),
                'name' => 'All Products'
            ]
        ];
        
        foreach ($categories as $category) {
            $categoryData[$category->slug] = [
                'total' => $category->products_count,
                'pages' => ceil($category->products_count / 16),
                'name' => $category->name
            ];
        }
        
        return $categoryData;
    }
}