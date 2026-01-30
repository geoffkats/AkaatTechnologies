<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add(Request $request, Product $product)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required'], 401);
        }
        
        $user = Auth::user();
        
        // Check if already in wishlist
        if (!$user->wishlist()->where('product_id', $product->id)->exists()) {
            $user->wishlist()->create([
                'product_id' => $product->id
            ]);
        }
        
        return response()->json(['success' => true, 'message' => 'Product added to wishlist']);
    }
    
    public function remove(Request $request, Product $product)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Authentication required'], 401);
        }
        
        $user = Auth::user();
        $user->wishlist()->where('product_id', $product->id)->delete();
        
        return response()->json(['success' => true, 'message' => 'Product removed from wishlist']);
    }
}