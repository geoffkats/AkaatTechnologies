<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\OrderStatus;
use App\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }
    
    public function process(Request $request)
    {
        // Validate the checkout form
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'delivery_method' => 'required|in:pickup,delivery',
            'address' => 'required_if:delivery_method,delivery|string|max:500',
            'city' => 'required_if:delivery_method,delivery|string|max:100',
            'district' => 'required_if:delivery_method,delivery|string|max:100',
            'payment_method' => 'required|in:mobile_money,bank_transfer,cash_on_delivery',
            'notes' => 'nullable|string|max:1000',
        ]);
        
        // Get cart from session
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty. Please add items before checkout.'
            ], 400);
        }
        
        // Calculate totals
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $deliveryFee = $validated['delivery_method'] === 'delivery' ? 15000 : 0;
        $total = $subtotal + $deliveryFee;
        
        try {
            // Create the order
            $order = Order::create([
                'order_number' => 'AKAAT-' . strtoupper(Str::random(8)),
                'user_id' => auth()->id(), // null if guest
                'customer_name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'customer_email' => $validated['email'],
                'customer_phone' => $validated['phone'],
                'delivery_method' => $validated['delivery_method'],
                'delivery_address' => $validated['delivery_method'] === 'delivery' ? 
                    $validated['address'] . ', ' . $validated['city'] . ', ' . $validated['district'] : null,
                'payment_method' => $validated['payment_method'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'tax_amount' => 0,
                'total_amount' => $total,
                'status' => OrderStatus::Pending,
                'payment_status' => PaymentStatus::Pending,
                'notes' => $validated['notes'],
                'meta_data' => [
                    'delivery_city' => $validated['city'] ?? null,
                    'delivery_district' => $validated['district'] ?? null,
                ]
            ]);
            
            // Create order items
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                
                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_sku' => $product->sku,
                        'quantity' => $item['quantity'],
                        'unit_price' => $item['price'],
                        'total_price' => $item['price'] * $item['quantity'],
                    ]);
                    
                    // Update product stock
                    $product->decrement('stock_quantity', $item['quantity']);
                }
            }
            
            // Clear the cart
            session()->forget('cart');
            
            // Send order confirmation email (implement later)
            // $this->sendOrderConfirmation($order);
            
            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'order_id' => $order->id,
                'order_number' => $order->order_number
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your order. Please try again.'
            ], 500);
        }
    }
    
    public function confirmation(Order $order)
    {
        return view('checkout.confirmation', compact('order'));
    }
    
    private function sendOrderConfirmation(Order $order)
    {
        // TODO: Implement email sending
        // This would typically use Laravel's Mail facade to send confirmation emails
    }
}
