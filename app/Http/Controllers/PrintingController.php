<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PrintingPrice;
use App\OrderStatus;
use App\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrintingController extends Controller
{
    public function index()
    {
        return view('printing.index');
    }

    public function order()
    {
        // Get available pricing options
        $paperTypes = PrintingPrice::active()->distinct()->pluck('paper_type')->toArray();
        $paperSizes = PrintingPrice::active()->distinct()->pluck('paper_size')->toArray();
        $colorTypes = ['black_white' => 'Black & White', 'color' => 'Color'];
        $printTypes = ['single_sided' => 'Single-sided', 'double_sided' => 'Double-sided'];
        
        return view('printing.order', compact('paperTypes', 'paperSizes', 'colorTypes', 'printTypes'));
    }

    public function getPricing(Request $request)
    {
        $request->validate([
            'paper_type' => 'required|string',
            'paper_size' => 'required|string',
            'color_type' => 'required|in:black_white,color',
            'print_type' => 'required|in:single_sided,double_sided',
            'quantity' => 'required|integer|min:1',
            'copies' => 'required|integer|min:1'
        ]);

        $pricePerPage = PrintingPrice::getPriceForConfig(
            $request->paper_type,
            $request->paper_size,
            $request->color_type,
            $request->print_type,
            $request->quantity * $request->copies
        );

        $totalCost = PrintingPrice::calculateTotal(
            $request->paper_type,
            $request->paper_size,
            $request->color_type,
            $request->print_type,
            $request->quantity,
            $request->copies
        );

        // Check if bulk discount applies
        $pricing = PrintingPrice::active()
            ->where('paper_type', $request->paper_type)
            ->where('paper_size', $request->paper_size)
            ->where('color_type', $request->color_type)
            ->where('print_type', $request->print_type)
            ->first();

        $bulkDiscount = false;
        $bulkThreshold = null;
        $bulkPrice = null;

        if ($pricing && $pricing->bulk_discount_threshold && $pricing->bulk_discount_price) {
            $totalPages = $request->quantity * $request->copies;
            $bulkThreshold = $pricing->bulk_discount_threshold;
            $bulkPrice = $pricing->bulk_discount_price;
            $bulkDiscount = $totalPages >= $bulkThreshold;
        }

        return response()->json([
            'success' => true,
            'price_per_page' => $pricePerPage,
            'total_cost' => $totalCost,
            'formatted_price_per_page' => 'UGX ' . number_format($pricePerPage),
            'formatted_total_cost' => 'UGX ' . number_format($totalCost),
            'bulk_discount' => $bulkDiscount,
            'bulk_threshold' => $bulkThreshold,
            'bulk_price' => $bulkPrice,
            'formatted_bulk_price' => $bulkPrice ? 'UGX ' . number_format($bulkPrice) : null,
        ]);
    }

    public function submitOrder(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'paper_type' => 'required|string',
            'paper_size' => 'required|string',
            'color_type' => 'required|in:black_white,color',
            'print_type' => 'required|in:single_sided,double_sided',
            'quantity' => 'required|integer|min:1',
            'copies' => 'required|integer|min:1',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240', // 10MB max
            'special_instructions' => 'nullable|string|max:1000',
            'delivery_option' => 'required|in:pickup,delivery',
            'delivery_address' => 'required_if:delivery_option,delivery|nullable|string|max:500',
            'rush_order' => 'boolean',
        ]);

        // Calculate pricing using the new system
        $totalCost = PrintingPrice::calculateTotal(
            $validated['paper_type'],
            $validated['paper_size'],
            $validated['color_type'],
            $validated['print_type'],
            $validated['quantity'],
            $validated['copies']
        );

        // Add rush order fee (50% extra)
        if ($validated['rush_order'] ?? false) {
            $totalCost *= 1.5;
        }

        // Delivery fee
        $deliveryFee = ($validated['delivery_option'] === 'delivery') ? 15000 : 0;
        $finalTotal = $totalCost + $deliveryFee;

        try {
            // Store the uploaded file
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('printing-orders', 'public');
            }

            // Create printing order
            $order = Order::create([
                'order_number' => 'PRINT-' . strtoupper(Str::random(8)),
                'user_id' => auth()->id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'delivery_method' => $validated['delivery_option'],
                'delivery_address' => $validated['delivery_address'] ?? null,
                'payment_method' => 'cash_on_delivery',
                'subtotal' => $totalCost,
                'delivery_fee' => $deliveryFee,
                'tax_amount' => 0,
                'total_amount' => $finalTotal,
                'status' => OrderStatus::Pending,
                'payment_status' => PaymentStatus::Pending,
                'type' => 'printing',
                'notes' => $validated['special_instructions'],
                'meta_data' => [
                    'print_specifications' => [
                        'paper_type' => $validated['paper_type'],
                        'paper_size' => $validated['paper_size'],
                        'color_type' => $validated['color_type'],
                        'print_type' => $validated['print_type'],
                        'quantity' => $validated['quantity'],
                        'copies' => $validated['copies'],
                        'rush_order' => $validated['rush_order'] ?? false,
                    ],
                    'uploaded_file' => $filePath,
                    'pricing_breakdown' => [
                        'print_cost' => $totalCost,
                        'delivery_fee' => $deliveryFee,
                        'total' => $finalTotal
                    ]
                ]
            ]);

            return redirect()->route('printing.order')->with('success', [
                'message' => 'Your printing order has been submitted successfully!',
                'order_number' => $order->order_number,
                'total_cost' => $finalTotal,
                'formatted_total_cost' => 'UGX ' . number_format($finalTotal),
                'estimated_completion' => $validated['rush_order'] ?? false ? '2-4 hours' : '24-48 hours'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('printing.order')->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    /**
     * Get all pricing options for admin dashboard
     */
    public function getAllPricing()
    {
        $prices = PrintingPrice::active()->orderBy('paper_size')->orderBy('paper_type')->get();
        return response()->json($prices);
    }

    /**
     * Update pricing (for admin dashboard)
     */
    public function updatePricing(Request $request, PrintingPrice $printingPrice)
    {
        $validated = $request->validate([
            'price_per_page' => 'required|numeric|min:0',
            'bulk_discount_threshold' => 'nullable|numeric|min:0',
            'bulk_discount_price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        $printingPrice->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pricing updated successfully',
            'pricing' => $printingPrice
        ]);
    }
}
