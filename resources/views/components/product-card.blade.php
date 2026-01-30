@props([
    'product',
    'showQuickActions' => true,
    'showWishlist' => true,
    'showQuickView' => true,
    'cardSize' => 'default', // 'small', 'default', 'large'
    'layout' => 'vertical' // 'vertical', 'horizontal'
])

@php
    $cardClasses = match($cardSize) {
        'small' => 'max-w-xs',
        'large' => 'max-w-md',
        default => 'max-w-sm'
    };
    
    $imageHeight = match($cardSize) {
        'small' => 'h-40',
        'large' => 'h-56',
        default => 'h-48'
    };
    
    $isHorizontal = $layout === 'horizontal';
@endphp

<div class="product-card group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden relative {{ $cardClasses }} {{ $isHorizontal ? 'flex' : '' }}" 
     data-product-id="{{ $product->id }}">
     
    <!-- Product Badges -->
    <div class="absolute top-3 left-3 z-20 flex flex-col gap-2">
        @if($product->featured)
        <div class="bg-akaat-green text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
            ⭐ Featured
        </div>
        @endif
        
        @if($product->discount_percentage > 0)
        <div class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
            -{{ $product->discount_percentage }}%
        </div>
        @endif
    </div>
    
    <!-- Wishlist & Quick View Actions -->
    @if($showQuickActions)
    <div class="absolute top-3 right-3 z-20 flex {{ $isHorizontal ? 'flex-row gap-2' : 'flex-col gap-2' }}">
        @if($showWishlist)
        <button class="wishlist-btn bg-white/90 backdrop-blur-sm p-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 cursor-pointer hover:bg-white hover:scale-110 shadow-lg"
                onclick="toggleWishlist({{ $product->id }})">
            <svg class="w-4 h-4 text-gray-600 hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </button>
        @endif
        
        @if($showQuickView)
        <button class="quick-view-btn bg-white/90 backdrop-blur-sm p-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 cursor-pointer hover:bg-white hover:scale-110 shadow-lg"
                onclick="quickView({{ $product->id }})" style="transition-delay: 0.1s;">
            <svg class="w-4 h-4 text-gray-600 hover:text-akaat-blue transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </button>
        @endif
    </div>
    @endif
    
    <!-- Product Image with Overlay -->
    <div class="relative overflow-hidden {{ $isHorizontal ? 'w-1/3' : 'w-full' }}">
        <a href="{{ route('shop.product', $product) }}">
            <img src="{{ $product->image_url ?: ($product->images && count($product->images) > 0 ? $product->images[0] : 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=400&auto=format&fit=crop') }}" 
                 alt="{{ $product->name }}" 
                 class="w-full {{ $imageHeight }} object-cover group-hover:scale-105 transition-transform duration-500">
        </a>
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        
        <!-- Quick Add Button -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
            <button class="bg-akaat-green hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2"
                    onclick="quickAdd({{ $product->id }})">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                </svg>
                Quick Add
            </button>
        </div>
    </div>
    
    <!-- Product Info -->
    <div class="p-5 {{ $isHorizontal ? 'w-2/3' : 'w-full' }}">
        <!-- Header Row -->
        <div class="flex items-start justify-between mb-3">
            <div class="flex-1">
                <a href="{{ route('shop.product', $product) }}">
                    <h3 class="text-lg font-bold text-gray-900 mb-1 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors line-clamp-2">
                        {{ $product->name }}
                    </h3>
                </a>
                <p class="text-gray-600 text-sm font-['Inter'] line-clamp-2">
                    {{ Str::limit($product->description, 60) }}
                </p>
            </div>
            <div class="flex items-center gap-1 ml-3">
                <div class="w-2 h-2 rounded-full {{ $product->stock > 0 ? 'bg-green-500 animate-pulse' : 'bg-red-500' }}"></div>
                <span class="text-xs font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                </span>
            </div>
        </div>
        
        <!-- Rating & Category -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <div class="flex text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-3.5 h-3.5 {{ $i <= $product->rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-sm text-gray-600 font-medium">{{ number_format($product->rating, 1) }}</span>
                <span class="text-xs text-gray-400">({{ $product->reviews_count ?? 0 }})</span>
            </div>
            <span class="text-xs font-semibold text-akaat-blue bg-blue-50 px-2 py-1 rounded-lg">
                {{ strtoupper($product->category->name ?? 'PRODUCT') }}
            </span>
        </div>
        
        <!-- Pricing -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xl font-bold text-akaat-blue">UGX {{ $product->formatted_price }}</span>
                    @if($product->original_price > $product->price)
                        <span class="text-sm text-gray-500 line-through">UGX {{ $product->formatted_original_price }}</span>
                    @endif
                </div>
                @if($product->discount_amount > 0)
                    <span class="text-xs text-green-600 font-medium">Save UGX {{ $product->formatted_discount_amount }}</span>
                @endif
            </div>
        </div>
        
        <!-- Action Button -->
        <button class="w-full bg-akaat-blue hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2"
                onclick="addToCart({{ $product->id }})">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
            </svg>
            Add to Cart
        </button>
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .product-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
    }
</style>

<script>
    function toggleWishlist(productId) {
        @auth
        fetch(`/wishlist/add/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showNotification(data.message, 'success');
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('An error occurred. Please try again.', 'error');
        });
        @else
        showNotification('Please login to add items to wishlist', 'info');
        @endauth
    }
    
    function quickView(productId) {
        // Redirect to product page for quick view
        window.location.href = `/shop/product/${productId}`;
    }
    
    function quickAdd(productId) {
        addToCart(productId);
    }
    
    function addToCart(productId) {
        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                updateCartCount(data.cart_count);
                
                // Update the button for this specific product
                const productCard = document.querySelector(`[data-product-id="${productId}"]`);
                if (productCard) {
                    const addToCartBtn = productCard.querySelector('button[onclick*="addToCart"]');
                    if (addToCartBtn) {
                        const originalHTML = addToCartBtn.innerHTML;
                        
                        // Show success state
                        addToCartBtn.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            ${data.already_in_cart ? 'Updated!' : 'Added!'}
                        `;
                        addToCartBtn.classList.remove('bg-akaat-blue', 'hover:bg-blue-700');
                        addToCartBtn.classList.add('bg-green-500');
                        
                        // Revert after 2 seconds
                        setTimeout(() => {
                            if (data.already_in_cart) {
                                addToCartBtn.innerHTML = `
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    In Cart (${data.new_quantity})
                                `;
                                addToCartBtn.classList.remove('bg-green-500');
                                addToCartBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                            } else {
                                addToCartBtn.innerHTML = originalHTML;
                                addToCartBtn.classList.remove('bg-green-500');
                                addToCartBtn.classList.add('bg-akaat-blue', 'hover:bg-blue-700');
                            }
                        }, 2000);
                    }
                }
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('An error occurred. Please try again.', 'error');
        });
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
    
    function updateCartCount(count) {
        // Update cart count in navigation if it exists
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(element => {
            element.textContent = count;
            element.style.display = count > 0 ? 'block' : 'none';
        });
    }
    
    // Check cart status for all products on page load
    document.addEventListener('DOMContentLoaded', function() {
        checkAllProductsCartStatus();
    });
    
    function checkAllProductsCartStatus() {
        const productCards = document.querySelectorAll('.product-card[data-product-id]');
        
        productCards.forEach(card => {
            const productId = card.getAttribute('data-product-id');
            
            fetch(`/cart/status/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.in_cart) {
                        const addToCartBtn = card.querySelector('button[onclick*="addToCart"]');
                        if (addToCartBtn) {
                            addToCartBtn.innerHTML = `
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                In Cart (${data.quantity})
                            `;
                            addToCartBtn.classList.remove('bg-akaat-blue', 'hover:bg-blue-700');
                            addToCartBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                        }
                    }
                })
                .catch(error => {
                    // Silently fail - not critical
                });
        });
    }
</script>