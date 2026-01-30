@extends('layouts.app')

@section('title', 'All Products - AKAAT Technologies')
@section('description', 'Browse all our tech products, office supplies, and stationery items.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')],
    ['title' => 'All Products', 'url' => route('shop.all')]
]" />
@endsection

@section('content')
    <!-- Header Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-green-50 rounded-lg mb-6 border border-green-100">
                    <span class="text-akaat-green font-bold text-xs">🛒 ALL PRODUCTS</span>
                </div>
                
                <h1 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Complete Product <span class="text-akaat-green italic">Catalog</span>
                </h1>
                
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Explore our complete collection of {{ $totalProducts }} premium tech products, office supplies, and accessories.
                </p>
            </div>

            <!-- Stats -->
            <div class="flex items-center justify-center gap-8 mb-12">
                <div class="text-center">
                    <div class="text-3xl font-bold text-akaat-blue mb-1">{{ $totalProducts }}</div>
                    <div class="text-sm text-gray-500">Total Products</div>
                </div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-akaat-green mb-1">{{ $categoriesCount }}</div>
                    <div class="text-sm text-gray-500">Categories</div>
                </div>
                <div class="w-px h-8 bg-gray-300"></div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-brand-orange mb-1">4.8★</div>
                    <div class="text-sm text-gray-500">Avg Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <!-- Filter Bar -->
            <div class="bg-white rounded-xl p-4 shadow-lg border border-gray-100 mb-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <span class="text-sm font-medium text-gray-700">Sort by:</span>
                        <select class="px-4 py-2 rounded-lg border border-gray-200 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-akaat-green focus:border-transparent bg-white">
                            <option>Popular</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Rating</option>
                        </select>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Showing {{ $products->count() }} of {{ $totalProducts }} products</span>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
                @forelse($products as $product)
                    <div class="product-card group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Product Badge -->
                            @if($product->featured)
                                <div class="absolute top-3 left-3 bg-akaat-green text-white px-2 py-1 rounded-full text-xs font-bold">
                                    Featured
                                </div>
                            @endif
                            
                            <!-- Wishlist Button -->
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer hover:bg-white">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-[#111827] mb-2 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                <a href="{{ route('shop.product', $product) }}">{{ $product->name }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 font-['Inter']">
                                {{ Str::limit($product->description, 50) }}
                            </p>
                            
                            <!-- Rating & Category -->
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
                                @if($product->category)
                                    <span class="text-xs font-semibold text-akaat-blue bg-blue-50 px-2 py-1 rounded-lg">
                                        {{ strtoupper($product->category->name) }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Price -->
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <span class="text-xl font-bold text-akaat-blue">
                                        UGX {{ number_format($product->price) }}
                                    </span>
                                    @if($product->original_price && $product->original_price > $product->price)
                                        <span class="text-sm text-gray-500 line-through ml-2">
                                            UGX {{ number_format($product->original_price) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-lg">
                                    @if($product->stock_quantity > 0)
                                        <span class="text-green-600 font-medium">In Stock</span>
                                    @else
                                        <span class="text-red-600 font-medium">Out of Stock</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Add to Cart Button -->
                            <a href="{{ route('shop.product', $product) }}" class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No Products Found</h3>
                        <p class="text-gray-600 mb-6">We're working on adding more products to our catalog.</p>
                        <a href="{{ route('shop') }}" class="bg-akaat-green hover:bg-green-600 text-white px-6 py-3 rounded-xl font-semibold transition-colors">
                            Back to Shop
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="flex justify-center">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-10 text-center">
            <div class="bg-gradient-to-br from-akaat-green/5 to-akaat-blue/5 rounded-[40px] p-12 border border-gray-100">
                <h2 class="text-4xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans']">
                    Need Help Finding <span class="text-akaat-green italic">Something?</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 font-['Inter']">
                    Can't find what you're looking for? Our team is here to help you find the perfect products.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-akaat-green hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-bold transition-colors">
                        Contact Us
                    </a>
                    <a href="{{ route('shop') }}" class="bg-white border-2 border-gray-200 hover:border-akaat-green text-gray-700 hover:text-akaat-green px-8 py-4 rounded-2xl font-bold transition-colors">
                        Back to Shop
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection