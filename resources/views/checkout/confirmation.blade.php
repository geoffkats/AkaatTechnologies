@extends('layouts.app')

@section('title', 'Order Confirmation - AKAAT Technologies')

@section('content')
<div class="max-w-4xl mx-auto px-6 lg:px-10 py-12">
    <!-- Success Header -->
    <div class="text-center mb-12">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-['Plus_Jakarta_Sans']">
            Order Confirmed!
        </h1>
        <p class="text-lg text-gray-600 mb-2">
            Thank you for your order. We've received your order and will process it shortly.
        </p>
        <p class="text-sm text-gray-500">
            Order Number: <span class="font-semibold text-akaat-blue">{{ $order->order_number }}</span>
        </p>
    </div>
    
    <!-- Order Details -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Details</h2>
        
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Customer Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Customer Information
                </h3>
                <div class="space-y-2 text-sm">
                    <p><span class="font-medium">Name:</span> {{ $order->customer_name }}</p>
                    <p><span class="font-medium">Email:</span> {{ $order->customer_email }}</p>
                    <p><span class="font-medium">Phone:</span> {{ $order->customer_phone }}</p>
                </div>
            </div>
            
            <!-- Delivery Information -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Delivery Information
                </h3>
                <div class="space-y-2 text-sm">
                    <p><span class="font-medium">Method:</span> 
                        {{ $order->delivery_method === 'pickup' ? 'Store Pickup' : 'Home/Office Delivery' }}
                    </p>
                    @if($order->delivery_method === 'delivery' && $order->delivery_address)
                        <p><span class="font-medium">Address:</span> {{ $order->delivery_address }}</p>
                    @endif
                    @if($order->delivery_method === 'pickup')
                        <p class="text-gray-600">
                            <strong>Pickup Location:</strong><br>
                            AKAAT Technologies Office<br>
                            Kampala, Uganda<br>
                            <span class="text-akaat-blue">We'll contact you when ready for pickup</span>
                        </p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Payment Information -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                Payment Information
            </h3>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm mb-2">
                    <span class="font-medium">Payment Method:</span> 
                    @switch($order->payment_method)
                        @case('mobile_money')
                            Mobile Money (MTN/Airtel)
                            @break
                        @case('bank_transfer')
                            Bank Transfer
                            @break
                        @case('cash_on_delivery')
                            Cash on {{ $order->delivery_method === 'pickup' ? 'Pickup' : 'Delivery' }}
                            @break
                    @endswitch
                </p>
                <p class="text-sm">
                    <span class="font-medium">Payment Status:</span> 
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        {{ $order->payment_status->value === 'paid' ? 'bg-green-100 text-green-800' : 
                           ($order->payment_status->value === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($order->payment_status->value) }}
                    </span>
                </p>
                
                @if($order->payment_method !== 'cash_on_delivery')
                    <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                        <p class="text-sm text-blue-800 font-medium mb-2">Payment Instructions:</p>
                        @if($order->payment_method === 'mobile_money')
                            <p class="text-sm text-blue-700">
                                We'll send you mobile money payment instructions via SMS/WhatsApp shortly. 
                                Please complete payment within 24 hours to confirm your order.
                            </p>
                        @elseif($order->payment_method === 'bank_transfer')
                            <p class="text-sm text-blue-700">
                                Bank transfer details will be sent to your email. 
                                Please complete payment within 24 hours to confirm your order.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Order Items -->
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h3>
            <div class="space-y-4">
                @foreach($order->orderItems as $item)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-900">{{ $item->product_name }}</h4>
                            <p class="text-sm text-gray-600">SKU: {{ $item->product_sku }}</p>
                            <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-medium text-gray-900">UGX {{ number_format($item->total_price) }}</p>
                            <p class="text-sm text-gray-600">UGX {{ number_format($item->unit_price) }} each</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">UGX {{ number_format($order->subtotal) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Delivery</span>
                        <span class="font-medium">
                            {{ $order->delivery_fee > 0 ? 'UGX ' . number_format($order->delivery_fee) : 'FREE' }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-medium">UGX {{ number_format($order->tax_amount) }}</span>
                    </div>
                    <div class="border-t border-gray-300 pt-2">
                        <div class="flex justify-between">
                            <span class="text-lg font-bold text-gray-900">Total</span>
                            <span class="text-lg font-bold text-akaat-blue">UGX {{ number_format($order->total_amount) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if($order->notes)
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Order Notes</h3>
                <p class="text-gray-600 bg-gray-50 rounded-lg p-4">{{ $order->notes }}</p>
            </div>
        @endif
    </div>
    
    <!-- Next Steps -->
    <div class="bg-akaat-blue text-white rounded-2xl p-8 mb-8">
        <h2 class="text-2xl font-bold mb-4">What's Next?</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <span class="text-sm font-bold">1</span>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Order Processing</h3>
                        <p class="text-sm opacity-90">We'll review and prepare your order within 1-2 business days.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <span class="text-sm font-bold">2</span>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Contact & Updates</h3>
                        <p class="text-sm opacity-90">We'll contact you via phone/email with updates and payment instructions.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <span class="text-sm font-bold">3</span>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">
                            {{ $order->delivery_method === 'pickup' ? 'Ready for Pickup' : 'Delivery' }}
                        </h3>
                        <p class="text-sm opacity-90">
                            {{ $order->delivery_method === 'pickup' ? 
                               "We'll notify you when your order is ready for pickup at our office." : 
                               "Your order will be delivered to your specified address." }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <span class="text-sm font-bold">4</span>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Support</h3>
                        <p class="text-sm opacity-90">Need help? Contact us anytime for order support and assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="text-center space-y-4">
        <div class="space-x-4">
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-akaat-green text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Continue Shopping
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white border-2 border-akaat-blue text-akaat-blue px-6 py-3 rounded-xl font-semibold hover:bg-akaat-blue hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                Contact Support
            </a>
        </div>
        
        <p class="text-sm text-gray-600">
            Questions about your order? Email us at 
            <a href="mailto:orders@akaat.co.ug" class="text-akaat-blue hover:underline">orders@akaat.co.ug</a> 
            or call <a href="tel:+256123456789" class="text-akaat-blue hover:underline">+256 123 456 789</a>
        </p>
    </div>
</div>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .hover\:bg-akaat-blue:hover { background-color: #0F4C81; }
    .hover\:text-white:hover { color: white; }
</style>
@endsection