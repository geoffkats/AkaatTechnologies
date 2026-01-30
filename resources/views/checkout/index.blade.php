@extends('layouts.app')

@section('title', 'Checkout - AKAAT Technologies')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')],
    ['title' => 'Cart', 'url' => route('cart.index')],
    ['title' => 'Checkout', 'url' => route('checkout.index')]
]" />
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8 font-['Plus_Jakarta_Sans']">
        Checkout
    </h1>
    
    <div id="checkout-content">
        <!-- Loading state -->
        <div id="checkout-loading" class="text-center py-20">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-akaat-blue mx-auto mb-4"></div>
            <p class="text-gray-600">Loading checkout...</p>
        </div>
        
        <!-- Empty cart redirect -->
        <div id="empty-cart-redirect" class="text-center py-20 hidden">
            <div class="text-gray-400 text-6xl mb-6">🛒</div>
            <h2 class="text-2xl font-bold text-gray-600 mb-3">Your cart is empty</h2>
            <p class="text-gray-500 mb-6">Add some products before proceeding to checkout.</p>
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-akaat-green text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Continue Shopping
            </a>
        </div>
        
        <!-- Checkout form -->
        <div id="checkout-form" class="hidden">
            <form id="checkout-form-element" class="grid lg:grid-cols-3 gap-8">
                @csrf
                
                <!-- Checkout Details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Customer Information -->
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Customer Information
                        </h2>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            </div>
                            <div class="md:col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            </div>
                            <div class="md:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required placeholder="+256 XXX XXX XXX"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Delivery Information -->
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Delivery Information
                        </h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Delivery Method *</label>
                                <div class="space-y-3">
                                    <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="delivery_method" value="pickup" class="text-akaat-blue focus:ring-akaat-blue" checked>
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900">Store Pickup</div>
                                            <div class="text-sm text-gray-600">Pick up from our office in Kampala - FREE</div>
                                        </div>
                                    </label>
                                    <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="delivery_method" value="delivery" class="text-akaat-blue focus:ring-akaat-blue">
                                        <div class="ml-3">
                                            <div class="font-medium text-gray-900">Home/Office Delivery</div>
                                            <div class="text-sm text-gray-600">Delivery within Kampala - UGX 15K</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div id="delivery-address" class="hidden space-y-4">
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Delivery Address *</label>
                                    <textarea id="address" name="address" rows="3" 
                                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors"
                                              placeholder="Enter your full delivery address"></textarea>
                                </div>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                        <input type="text" id="city" name="city" value="Kampala"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                                    </div>
                                    <div>
                                        <label for="district" class="block text-sm font-medium text-gray-700 mb-2">District *</label>
                                        <input type="text" id="district" name="district" value="Kampala"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            Payment Method
                        </h2>
                        
                        <div class="space-y-3">
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="radio" name="payment_method" value="mobile_money" class="text-akaat-blue focus:ring-akaat-blue" checked>
                                <div class="ml-3 flex items-center">
                                    <div>
                                        <div class="font-medium text-gray-900">Mobile Money</div>
                                        <div class="text-sm text-gray-600">MTN Mobile Money, Airtel Money</div>
                                    </div>
                                    <div class="ml-auto flex space-x-2">
                                        <div class="w-8 h-5 bg-yellow-400 rounded text-xs flex items-center justify-center font-bold text-black">MTN</div>
                                        <div class="w-8 h-5 bg-red-600 rounded text-xs flex items-center justify-center font-bold text-white">AIR</div>
                                    </div>
                                </div>
                            </label>
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="radio" name="payment_method" value="bank_transfer" class="text-akaat-blue focus:ring-akaat-blue">
                                <div class="ml-3">
                                    <div class="font-medium text-gray-900">Bank Transfer</div>
                                    <div class="text-sm text-gray-600">Direct bank transfer to our account</div>
                                </div>
                            </label>
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                <input type="radio" name="payment_method" value="cash_on_delivery" class="text-akaat-blue focus:ring-akaat-blue">
                                <div class="ml-3">
                                    <div class="font-medium text-gray-900">Cash on Delivery/Pickup</div>
                                    <div class="text-sm text-gray-600">Pay when you receive your order</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Order Notes -->
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Order Notes (Optional)
                        </h2>
                        
                        <textarea name="notes" rows="4" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue transition-colors"
                                  placeholder="Any special instructions for your order..."></textarea>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                        
                        <!-- Order Items -->
                        <div id="order-items" class="space-y-4 mb-6">
                            <!-- Items will be loaded here -->
                        </div>
                        
                        <!-- Order Totals -->
                        <div class="border-t border-gray-200 pt-4 space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium" id="subtotal">UGX 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Delivery</span>
                                <span class="font-medium" id="delivery-fee">FREE</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-medium">UGX 0</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-lg font-bold text-akaat-blue" id="total">UGX 0</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Place Order Button -->
                        <button type="submit" id="place-order-btn" 
                                class="w-full bg-akaat-green hover:bg-green-600 text-white py-4 rounded-xl font-bold text-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Place Order
                        </button>
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('cart.index') }}" class="text-akaat-blue hover:text-blue-700 text-sm font-medium">
                                ← Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadCheckout();
        setupFormHandlers();
    });
    
    function loadCheckout() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(data => {
                document.getElementById('checkout-loading').classList.add('hidden');
                
                if (data.items.length === 0) {
                    document.getElementById('empty-cart-redirect').classList.remove('hidden');
                } else {
                    renderCheckout(data.items, data.total);
                }
            })
            .catch(error => {
                console.error('Error loading checkout:', error);
                document.getElementById('checkout-loading').classList.add('hidden');
                document.getElementById('empty-cart-redirect').classList.remove('hidden');
            });
    }
    
    function renderCheckout(items, subtotal) {
        // Render order items
        const orderItemsContainer = document.getElementById('order-items');
        let itemsHTML = '';
        
        items.forEach(item => {
            itemsHTML += `
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <img src="${item.image || 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=60&auto=format&fit=crop'}" 
                         alt="${item.name}" 
                         class="w-12 h-12 object-cover rounded-lg">
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 text-sm">${item.name}</h4>
                        <p class="text-xs text-gray-600">Qty: ${item.quantity}</p>
                    </div>
                    <div class="text-right">
                        <div class="font-medium text-gray-900">UGX ${formatPrice(item.price * item.quantity)}</div>
                    </div>
                </div>
            `;
        });
        
        orderItemsContainer.innerHTML = itemsHTML;
        
        // Update totals
        document.getElementById('subtotal').textContent = `UGX ${formatPrice(subtotal)}`;
        updateTotals(subtotal);
        
        // Show checkout form
        document.getElementById('checkout-form').classList.remove('hidden');
    }
    
    function setupFormHandlers() {
        // Delivery method change handler
        const deliveryRadios = document.querySelectorAll('input[name="delivery_method"]');
        deliveryRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const deliveryAddress = document.getElementById('delivery-address');
                const deliveryFeeElement = document.getElementById('delivery-fee');
                
                if (this.value === 'delivery') {
                    deliveryAddress.classList.remove('hidden');
                    deliveryFeeElement.textContent = 'UGX 15K';
                } else {
                    deliveryAddress.classList.add('hidden');
                    deliveryFeeElement.textContent = 'FREE';
                }
                
                // Update totals
                const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/[^\d]/g, ''));
                updateTotals(subtotal);
            });
        });
        
        // Form submission handler
        document.getElementById('checkout-form-element').addEventListener('submit', function(e) {
            e.preventDefault();
            processOrder();
        });
    }
    
    function updateTotals(subtotal) {
        const deliveryMethod = document.querySelector('input[name="delivery_method"]:checked').value;
        const deliveryFee = deliveryMethod === 'delivery' ? 15000 : 0;
        const total = subtotal + deliveryFee;
        
        document.getElementById('total').textContent = `UGX ${formatPrice(total)}`;
    }
    
    function processOrder() {
        const formData = new FormData(document.getElementById('checkout-form-element'));
        const placeOrderBtn = document.getElementById('place-order-btn');
        
        // Show loading state
        placeOrderBtn.innerHTML = `
            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
            Processing Order...
        `;
        placeOrderBtn.disabled = true;
        
        fetch('/checkout/process', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to order confirmation
                window.location.href = `/order/confirmation/${data.order_id}`;
            } else {
                showNotification(data.message || 'An error occurred. Please try again.', 'error');
                resetPlaceOrderButton();
            }
        })
        .catch(error => {
            console.error('Error processing order:', error);
            showNotification('An error occurred. Please try again.', 'error');
            resetPlaceOrderButton();
        });
    }
    
    function resetPlaceOrderButton() {
        const placeOrderBtn = document.getElementById('place-order-btn');
        placeOrderBtn.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Place Order
        `;
        placeOrderBtn.disabled = false;
    }
    
    function formatPrice(price) {
        if (price >= 1000000) {
            return (price / 1000000).toFixed(1) + 'M';
        } else if (price >= 1000) {
            return (price / 1000).toFixed(0) + 'K';
        } else {
            return price.toLocaleString();
        }
    }
    
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500' : 
            type === 'error' ? 'bg-red-500' : 
            'bg-blue-500'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 5000);
    }
</script>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
    .border-akaat-blue { border-color: #0F4C81; }
    .focus\:ring-akaat-blue:focus { --tw-ring-color: #0F4C81; }
    .focus\:border-akaat-blue:focus { border-color: #0F4C81; }
</style>
@endsection