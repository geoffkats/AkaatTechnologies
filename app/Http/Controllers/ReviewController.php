<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
            'order_id' => 'nullable|exists:orders,id'
        ]);

        // Check if user has already reviewed this product
        $existingReview = Review::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this product.'
            ], 400);
        }

        // If order_id is provided, verify user purchased this product
        if ($validated['order_id']) {
            $order = Order::where('id', $validated['order_id'])
                ->where('user_id', auth()->id())
                ->whereHas('orderItems', function($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->first();

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'You can only review products you have purchased.'
                ], 400);
            }
        }

        $review = Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'order_id' => $validated['order_id'],
            'rating' => $validated['rating'],
            'title' => $validated['title'],
            'comment' => $validated['comment'],
            'status' => 'approved' // Auto-approve for now
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully!',
            'review' => $review->load('user')
        ]);
    }

    public function index(Product $product)
    {
        $reviews = $product->reviews()
            ->with('user')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($reviews);
    }

    public function canReview(Product $product)
    {
        if (!auth()->check()) {
            return response()->json(['can_review' => false, 'reason' => 'login_required']);
        }

        // Check if user has already reviewed
        $existingReview = Review::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingReview) {
            return response()->json(['can_review' => false, 'reason' => 'already_reviewed']);
        }

        // Check if user has purchased this product
        $hasPurchased = Order::where('user_id', auth()->id())
            ->whereHas('orderItems', function($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->exists();

        return response()->json([
            'can_review' => $hasPurchased,
            'reason' => $hasPurchased ? null : 'purchase_required'
        ]);
    }
}
