@extends('layouts.app')

@section('title', 'Shopping Cart - AKAAT Technologies')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')],
    ['title' => 'Cart', 'url' => route('cart.index')]
]" />
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8 font-['Plus_Jakarta_Sans']">
        Shopping Cart
    </h1>
    
    <div id="cart-content">
        <!-- Loading state -->
        <div id="cart-loading" class="text-center py-20">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-akaat-blue mx-auto mb-4"></div>
            <p class="text-gray-600">Loading your cart...</p>
        </div>
        
        <!-- Empty cart state (hidden by default) -->
        <div id="empty-cart" class="text-center py-20 hidden">
            <div class="text-gray-400 text-6xl mb-6">🛒</div>
            <h2 class="text-2xl font-bold text-gray-600 mb-3">Your cart is empty</h2>
            <p class="text-gray-500 mb-6">Add some products to get started!</p>
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-akaat-green text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Continue Shopping
            </a>
        </div>
        
        <!-- Cart items container (hidden by default) -->
        <div id="cart-items" class="hidden"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadCart();
    });
    
    function loadCart() {
        fetch('/cart/data')
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-loading').classList.add('hidden');
                
                if (data.items.length === 0) {
                    document.getElementById('empty-cart').classList.remove('hidden');
                } else {
                    renderCartItems(data.items, data.total);
                }
            })
            .catch(error => {
                console.error('Error loading cart:', error);
                document.getElementById('cart-loading').classList.add('hidden');
                document.getElementById('empty-cart').classList.remove('hidden');
            });
    }
    
    function renderCartItems(items, total) {
        const cartItemsContainer = document.getElementById('cart-items');
        
        let html = `
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Cart Items (${items.length})</h2>
        `;
        
        items.forEach(item => {
            html += `
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 flex gap-4" data-product-id="${item.id}">
                    <img src="${item.image || 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=200&auto=format&fit=crop'}" 
                         alt="${item.name}" 
                         class="w-20 h-20 object-cover rounded-lg">
                    
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 mb-1">${item.name}</h3>
                        <p class="text-gray-600 text-sm mb-2">${item.description || ''}</p>
                        <span class="text-xs font-semibold text-akaat-blue bg-blue-50 px-2 py-1 rounded-lg">
                            ${item.category.toUpperCase()}
                        </span>
                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center gap-3">
                                <button onclick="updateQuantity(${item.id}, ${item.quantity - 1})" 
                                        class="w-8 h-8 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <span class="font-medium min-w-[2rem] text-center">${item.quantity}</span>
                                <button onclick="updateQuantity(${item.id}, ${item.quantity + 1})" 
                                        class="w-8 h-8 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-akaat-blue">UGX ${formatPrice(item.price * item.quantity)}</div>
                                <div class="text-sm text-gray-500">UGX ${formatPrice(item.price)} each</div>
                                <button onclick="removeFromCart(${item.id})" 
                                        class="text-red-500 hover:text-red-700 text-sm mt-1 transition-colors">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        html += `
                </div>
                
                <!-- Cart Summary -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 h-fit">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">UGX ${formatPrice(total)}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">UGX 0</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-lg font-bold text-akaat-blue">UGX ${formatPrice(total)}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <button onclick="proceedToCheckout()" 
                                class="w-full bg-akaat-blue hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition-colors">
                            Proceed to Checkout
                        </button>
                        <a href="{{ route('shop') }}" 
                           class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-xl font-semibold transition-colors text-center block">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        `;
        
        cartItemsContainer.innerHTML = html;
        cartItemsContainer.classList.remove('hidden');
    }
    
    function updateQuantity(productId, newQuantity) {
        if (newQuantity <= 0) {
            removeFromCart(productId);
            return;
        }
        
        fetch(`/cart/update/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: newQuantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCart(); // Reload cart to update totals
                showNotification(data.message, 'success');
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error updating cart:', error);
            showNotification('An error occurred. Please try again.', 'error');
        });
    }
    
    function removeFromCart(productId) {
        if (!confirm('Are you sure you want to remove this item from your cart?')) {
            return;
        }
        
        fetch(`/cart/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCart(); // Reload cart
                showNotification(data.message, 'success');
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error removing from cart:', error);
            showNotification('An error occurred. Please try again.', 'error');
        });
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
    
    function proceedToCheckout() {
        window.location.href = '{{ route("checkout.index") }}';
    }
    
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500' : 
            type === 'error' ? 'bg-red-500' : 
            'bg-blue-500'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
</script>

<style>
    .bg-akaat-blue { background-color: #0F4C81; }
    .text-akaat-blue { color: #0F4C81; }
    .bg-akaat-green { background-color: #2ECC71; }
    .text-akaat-green { color: #2ECC71; }
</style>
@endsection