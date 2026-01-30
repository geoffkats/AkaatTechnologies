@extends('layouts.app')

@section('title', $product->name . ' - AKAAT Technologies')
@section('description', Str::limit($product->description, 160))

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')],
    ['title' => $product->category ? $product->category->name : 'Products', 'url' => $product->category ? route('shop', ['category' => $product->category->slug]) : route('shop')],
    ['title' => $product->name, 'url' => route('shop.product', $product)]
]" />
@endsection

@section('content')
    <!-- Product Detail Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <!-- Product Images -->
                <div class="space-y-4">
                    <!-- Main Image -->
                    <div class="relative bg-gray-50 rounded-3xl overflow-hidden aspect-square">
                        @php
                            $mainImage = null;
                            if ($product->images && is_array($product->images) && count($product->images) > 0) {
                                $mainImage = $product->images[0];
                            } elseif ($product->image_url) {
                                $mainImage = $product->image_url;
                            }
                        @endphp
                        
                        @if($mainImage)
                            <img src="{{ $mainImage }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" 
                                 id="main-image"
                                 loading="eager"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/400x400/f3f4f6/9ca3af?text={{ urlencode($product->name) }}'; this.classList.add('opacity-75');">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <div class="text-center">
                                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-gray-400 text-sm">{{ $product->name }}</p>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Image Badges -->
                        @if($product->featured)
                            <div class="absolute top-6 left-6 bg-akaat-green text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Featured
                            </div>
                        @endif
                        
                        @if($product->original_price && $product->original_price > $product->price)
                            <div class="absolute top-6 right-6 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}% OFF
                            </div>
                        @endif
                    </div>
                    
                    <!-- Thumbnail Images -->
                    <div class="grid grid-cols-4 gap-4">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden cursor-pointer hover:ring-2 hover:ring-akaat-green transition-all duration-300 thumbnail-image {{ $i === 1 ? 'ring-2 ring-akaat-green' : '' }}" 
                                 onclick="changeMainImage('{{ $product->image_url ?? '' }}')">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }} view {{ $i }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
                
                <!-- Product Information -->
                <div class="space-y-8">
                    <!-- Product Header -->
                    <div>
                        @if($product->category)
                            <div class="text-sm font-medium text-akaat-green mb-2 uppercase tracking-wide">
                                {{ $product->category->name }}
                            </div>
                        @endif
                        
                        <h1 class="text-4xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">
                            {{ $product->name }}
                        </h1>
                        
                        <!-- Rating -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex items-center gap-1">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-600 ml-2">(4.8) • 127 reviews</span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 {{ $product->stock_quantity > 0 ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></div>
                                <span class="text-sm font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                                @if($product->stock_quantity > 0 && $product->stock_quantity <= 10)
                                    <span class="text-sm text-orange-600 font-medium">
                                        (Only {{ $product->stock_quantity }} left)
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Tabs -->
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8">
                            <button class="tab-button active py-4 px-1 border-b-2 border-akaat-green font-medium text-sm text-akaat-green" onclick="showTab('overview')">
                                OVERVIEW
                            </button>
                            <button class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" onclick="showTab('features')">
                                FEATURES
                            </button>
                            <button class="tab-button py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" onclick="showTab('specs')">
                                SPECS
                            </button>
                        </nav>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="tab-content" id="overview-content">
                        <p class="text-gray-600 leading-relaxed font-['Inter'] text-lg">
                            {{ $product->description ?: 'Experience premium quality and exceptional performance with this carefully selected product. Designed for professionals and enthusiasts who demand the best.' }}
                        </p>
                        
                        @if($product->features)
                            <div class="mt-6">
                                <h3 class="font-semibold text-gray-900 mb-3">Key Features:</h3>
                                <ul class="space-y-2">
                                    @foreach(explode(',', $product->features) as $feature)
                                        <li class="flex items-center gap-2 text-gray-600">
                                            <svg class="w-4 h-4 text-akaat-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            {{ trim($feature) }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    
                    <div class="tab-content hidden" id="features-content">
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">Premium Quality</h4>
                                    <p class="text-gray-600 text-sm">Built with high-quality materials for durability and performance.</p>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">Warranty</h4>
                                    <p class="text-gray-600 text-sm">Comes with manufacturer warranty for peace of mind.</p>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">Expert Support</h4>
                                    <p class="text-gray-600 text-sm">Professional installation and setup assistance available.</p>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">24/7 Support</h4>
                                    <p class="text-gray-600 text-sm">Round-the-clock customer support for all your needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-content hidden" id="specs-content">
                        <div class="space-y-4">
                            @if($product->specifications)
                                @foreach(json_decode($product->specifications, true) ?? [] as $spec => $value)
                                    <div class="flex justify-between py-3 border-b border-gray-100">
                                        <span class="font-medium text-gray-900">{{ ucfirst($spec) }}</span>
                                        <span class="text-gray-600">{{ $value }}</span>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8">
                                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-gray-500">Detailed specifications coming soon</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Product Options -->
                    <div class="space-y-6">
                        <!-- Size Selection (if applicable) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-3">Size</label>
                            <div class="flex flex-wrap gap-3">
                                @foreach(['S', 'M', 'L', 'XL'] as $size)
                                    <button class="size-option px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:border-akaat-green focus:outline-none focus:ring-2 focus:ring-akaat-green focus:border-akaat-green transition-colors {{ $loop->first ? 'border-akaat-green bg-akaat-green text-white' : 'text-gray-700' }}" 
                                            onclick="selectSize('{{ $size }}')">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Quantity Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-3">Quantity</label>
                            <div class="flex items-center space-x-3">
                                <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors" onclick="decreaseQuantity()">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>
                                <input type="number" id="quantity" value="1" min="1" max="{{ $product->stock_quantity }}" class="w-20 text-center border border-gray-300 rounded-lg py-2 focus:outline-none focus:ring-2 focus:ring-akaat-green focus:border-akaat-green">
                                <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors" onclick="increaseQuantity()">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-3xl font-bold text-[#111827] mb-1">
                                    UGX {{ number_format($product->price) }}
                                </div>
                                @if($product->original_price && $product->original_price > $product->price)
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg text-gray-500 line-through">
                                            UGX {{ number_format($product->original_price) }}
                                        </span>
                                        <span class="text-sm font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">
                                            Save UGX {{ number_format($product->original_price - $product->price) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <button id="add-to-cart-btn" onclick="addToCartFromProduct()" class="w-full bg-akaat-green hover:bg-green-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center justify-center gap-3 {{ $product->stock_quantity <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}" 
                                {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                            </svg>
                            {{ $product->stock_quantity > 0 ? 'Add to Cart' : 'Out of Stock' }}
                        </button>
                        
                        <button onclick="addToWishlist({{ $product->id }})" class="w-full bg-white border-2 border-gray-200 hover:border-akaat-green text-gray-700 hover:text-akaat-green py-4 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Save to Wishlist
                        </button>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-akaat-blue/10 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-6 h-6 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Secure Payment</div>
                                <div class="text-xs text-gray-600">Multiple options</div>
                            </div>
                            
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Quality Guarantee</div>
                                <div class="text-xs text-gray-600">100% authentic</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-[#111827] mb-4 font-['Plus_Jakarta_Sans']">
                        You Might Also <span class="text-akaat-green italic">Like</span>
                    </h2>
                    <p class="text-gray-600 font-['Inter']">
                        Similar products that other customers have purchased
                    </p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                            <div class="relative overflow-hidden">
                                <a href="{{ route('shop.product', $relatedProduct) }}">
                                    @if($relatedProduct->image_url)
                                        <img src="{{ $relatedProduct->image_url }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </a>
                                
                                <div class="absolute top-3 right-3 bg-white/90 backdrop-blur p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer hover:bg-white">
                                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <a href="{{ route('shop.product', $relatedProduct) }}">
                                    <h3 class="text-lg font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                        {{ $relatedProduct->name }}
                                    </h3>
                                </a>
                                <p class="text-gray-600 text-sm mb-4 font-['Inter']">
                                    {{ Str::limit($relatedProduct->description, 50) }}
                                </p>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-1">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-xs text-gray-500 ml-1">(4.8)</span>
                                    </div>
                                    @if($relatedProduct->category)
                                        <span class="text-xs font-semibold text-akaat-blue bg-blue-50 px-2 py-1 rounded-lg">
                                            {{ strtoupper($relatedProduct->category->name) }}
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-xl font-bold text-akaat-blue">
                                            UGX {{ number_format($relatedProduct->price) }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-lg">
                                        {{ $relatedProduct->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </div>
                                </div>
                                
                                <a href="{{ route('shop.product', $relatedProduct) }}" class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif



    
    <!-- JavaScript for Product Interactions -->
    <script>
        // Tab functionality
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-akaat-green', 'text-akaat-green');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');
            
            // Add active class to selected tab button
            event.target.classList.add('active', 'border-akaat-green', 'text-akaat-green');
            event.target.classList.remove('border-transparent', 'text-gray-500');
        }
        
        // Image gallery functionality
        function changeMainImage(imageSrc, thumbnailElement) {
            if (imageSrc && imageSrc !== 'null' && imageSrc !== '') {
                const mainImage = document.getElementById('main-image');
                if (mainImage) {
                    mainImage.src = imageSrc;
                }
            }
            
            // Update thumbnail selection
            document.querySelectorAll('.thumbnail-image').forEach(thumb => {
                thumb.classList.remove('ring-2', 'ring-akaat-green');
            });
            
            if (thumbnailElement) {
                thumbnailElement.classList.add('ring-2', 'ring-akaat-green');
            }
        }
        
        // Size selection
        function selectSize(size) {
            document.querySelectorAll('.size-option').forEach(option => {
                option.classList.remove('border-akaat-green', 'bg-akaat-green', 'text-white');
                option.classList.add('text-gray-700');
            });
            
            event.target.classList.add('border-akaat-green', 'bg-akaat-green', 'text-white');
            event.target.classList.remove('text-gray-700');
        }
        
        // Quantity controls
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.max);
            
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        }
        
        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
        
        // Add smooth scrolling for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Remove the opacity animation that was causing images not to show
            // Images will now load normally without the fade-in effect
            
            // Check if product is already in cart
            checkProductCartStatus();
        });
        
        // Check if current product is in cart
        function checkProductCartStatus() {
            const productId = {{ $product->id }};
            
            fetch(`/cart/status/${productId}`)
                .then(response => response.json())
                .then(data => {
                    updateAddToCartButton(data.in_cart, data.quantity);
                })
                .catch(error => {
                    console.log('Could not check cart status');
                });
        }
        
        // Update the add to cart button based on cart status
        function updateAddToCartButton(inCart, quantity) {
            const addToCartBtn = document.getElementById('add-to-cart-btn');
            
            if (inCart) {
                addToCartBtn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    In Cart (${quantity}) - Add More
                `;
                addToCartBtn.classList.remove('bg-akaat-green', 'hover:bg-green-600');
                addToCartBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
            } else {
                addToCartBtn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                    </svg>
                    Add to Cart
                `;
                addToCartBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                addToCartBtn.classList.add('bg-akaat-green', 'hover:bg-green-600');
            }
        }
        
        // Add to cart functionality
        function addToCartFromProduct() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const productId = {{ $product->id }};
            
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCount(data.cart_count);
                    
                    // Update button to show new status
                    updateAddToCartButton(true, data.new_quantity);
                    
                    // Show temporary success state
                    const addToCartBtn = document.getElementById('add-to-cart-btn');
                    const originalHTML = addToCartBtn.innerHTML;
                    const originalClasses = addToCartBtn.className;
                    
                    addToCartBtn.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        ${data.already_in_cart ? 'Updated!' : 'Added!'}
                    `;
                    addToCartBtn.className = 'w-full bg-green-500 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center justify-center gap-3';
                    
                    setTimeout(() => {
                        updateAddToCartButton(true, data.new_quantity);
                    }, 2000);
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred. Please try again.', 'error');
            });
        }
        
        // Add to wishlist functionality
        function addToWishlist(productId) {
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
        
        // Notification system
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
            }, 3000);
        }
        
        // Update cart count in navigation
        function updateCartCount(count) {
            const cartCountElements = document.querySelectorAll('.cart-count');
            cartCountElements.forEach(element => {
                element.textContent = count;
                element.style.display = count > 0 ? 'block' : 'none';
            });
        }
    </script>
    
    <style>
        .bg-akaat-blue { background-color: #0F4C81; }
        .text-akaat-blue { color: #0F4C81; }
        .bg-akaat-green { background-color: #2ECC71; }
        .text-akaat-green { color: #2ECC71; }
        .border-akaat-green { border-color: #2ECC71; }
        .hover\:border-akaat-green:hover { border-color: #2ECC71; }
        .hover\:text-akaat-green:hover { color: #2ECC71; }
        .focus\:ring-akaat-green:focus { --tw-ring-color: #2ECC71; }
        .focus\:border-akaat-green:focus { border-color: #2ECC71; }
        .ring-akaat-green { --tw-ring-color: #2ECC71; }
        .text-brand-orange { color: #F39C12; }
        .bg-brand-orange\/10 { background-color: rgba(243, 156, 18, 0.1); }
    </style>
@endsection