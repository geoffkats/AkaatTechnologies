@extends('layouts.app')

@section('title', 'Shop - AKAAT Technologies')
@section('description', 'Browse our selection of tech products, office supplies, and stationery items.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')]
]" />
@endsection

@section('content')
    <!-- Modern Hero Section -->
    <section class="hero-section bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-12 pb-8 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side -->
            <div class="relative z-10">
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-akaat-green/10 rounded-full mb-6 border border-akaat-green/20">
                    <span class="text-akaat-green font-bold text-sm">🛒 ONLINE SHOP</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 font-['Plus_Jakarta_Sans'] leading-tight">
                    Premium Tech Products & <br/>
                    <span class="text-akaat-green">Office Solutions</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-gray-600 text-lg leading-relaxed max-w-lg mb-8 font-['Inter']">
                    Discover our curated selection of premium technology products, office supplies, and professional equipment. Quality guaranteed for your business success.
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-start gap-4 mb-10">
                    <a href="#products" class="bg-akaat-green text-white px-8 py-4 rounded-xl font-semibold text-base shadow-lg shadow-green-200 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 font-['Plus_Jakarta_Sans']">
                        Browse Products
                    </a>
                    <a href="{{ route('shop.all') }}" class="group bg-white border-2 border-gray-200 text-gray-900 px-8 py-4 rounded-xl font-semibold text-base hover:border-akaat-green hover:bg-akaat-green hover:text-white transition-all duration-300 flex items-center gap-2 font-['Plus_Jakarta_Sans']">
                        View All Products 
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-akaat-blue mb-1">{{ $totalProducts }}+</div>
                        <div class="text-sm text-gray-500 font-medium">Products</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-akaat-green mb-1">24hr</div>
                        <div class="text-sm text-gray-500 font-medium">Fast Delivery</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-brand-orange mb-1">100%</div>
                        <div class="text-sm text-gray-500 font-medium">Authentic</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side (Visual Composition) -->
            <div class="relative min-h-[500px] flex items-center justify-center">
                <!-- Main Shop Image -->
                <div class="relative w-[300px] lg:w-[340px] h-[400px] lg:h-[450px] rounded-3xl border-8 border-white shadow-2xl overflow-hidden bg-gradient-to-br from-green-50 to-blue-50 z-10">
                    <img src="{{ asset('storage/assets/akaat_hero.png') }}" alt="AKAAT Tech Products" class="w-full h-full object-cover">
                    <!-- Overlay pill on image -->
                    <div class="absolute bottom-6 left-4 bg-white/95 backdrop-blur-sm px-3 py-2 rounded-lg text-xs font-semibold shadow-lg flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        Premium Quality Products
                    </div>
                </div>
                
                <!-- Floating Card: Best Seller -->
                <div class="absolute top-16 -left-4 lg:left-0 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 z-20 w-44 animate-float">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-gray-500 text-xs font-medium">Best Seller</span>
                        <span class="text-green-500 text-xs font-bold">🔥 Hot</span>
                    </div>
                    <div class="text-2xl font-bold text-gray-900 mb-1">MacBook Pro</div>
                    <div class="text-xs text-gray-400">M3 Series</div>
                </div>
                
                <!-- Floating Card: Deals -->
                <div class="absolute bottom-8 -right-4 lg:right-6 bg-white p-5 rounded-2xl shadow-xl border border-gray-100 z-20 w-48 animate-float-delayed">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-900 text-xs font-semibold">Special Deals</span>
                        <span class="text-green-500 text-xs font-bold">30% OFF</span>
                    </div>
                    <!-- Discount Badge -->
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">30%</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">Limited Time</div>
                            <div class="text-xs text-gray-500">Ends Soon</div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Icon Sidebar -->
                <div class="absolute top-8 right-0 bg-white p-2 rounded-xl shadow-lg border border-gray-100 flex flex-col gap-3 z-20">
                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-akaat-green" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                    </div>
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-sm">💻</div>
                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center text-sm">📱</div>
                    <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center text-sm">🖨️</div>
                </div>
                
                <!-- Modern Badge -->
                <div class="absolute bottom-20 -right-8 lg:-right-12 bg-akaat-blue text-white px-4 py-2 rounded-full text-xs font-semibold shadow-lg flex items-center gap-2 z-30 animate-float">
                    <span>⚡</span> Fast Shipping
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-['Plus_Jakarta_Sans']">
                    Our Products
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto font-['Inter']">
                    Explore our comprehensive range of technology products and office solutions
                </p>
            </div>

            <!-- Stats and Filters Section -->
            <div class="mb-12">
                <!-- Product Stats Row -->
                <div class="flex flex-wrap items-center justify-center gap-6 lg:gap-12 mb-8">
                    <div class="text-center">
                        <div class="text-xl lg:text-2xl font-bold text-akaat-blue mb-1" id="product-count">{{ $products->count() }}</div>
                        <div class="text-sm text-gray-500 font-medium">Products Shown</div>
                    </div>
                    <div class="w-px h-6 bg-gray-300 hidden sm:block"></div>
                    <div class="text-center">
                        <div class="text-xl lg:text-2xl font-bold text-akaat-green mb-1">{{ $totalProducts }}+</div>
                        <div class="text-sm text-gray-500 font-medium">Total Available</div>
                    </div>
                    <div class="w-px h-6 bg-gray-300 hidden sm:block"></div>
                    <div class="text-center">
                        <div class="text-xl lg:text-2xl font-bold text-brand-orange mb-1">4.8★</div>
                        <div class="text-sm text-gray-500 font-medium">Avg Rating</div>
                    </div>
                </div>
                
                <!-- Filters Section -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                    <!-- Category Filters -->
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4">Filter by Category</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('shop') }}" class="filter-btn {{ !request('category') ? 'active bg-akaat-green text-white shadow-lg' : 'bg-gray-50 border border-gray-200 text-gray-700 hover:border-akaat-green hover:bg-akaat-green hover:text-white' }} px-4 py-2.5 rounded-xl font-medium transition-all duration-300 text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    All Products
                                </span>
                            </a>
                            
                            <a href="{{ route('shop', ['category' => 'laptops-computers']) }}" class="filter-btn {{ request('category') == 'laptops-computers' ? 'active bg-akaat-green text-white shadow-lg' : 'bg-gray-50 border border-gray-200 text-gray-700 hover:border-akaat-blue hover:bg-akaat-blue hover:text-white' }} px-4 py-2.5 rounded-xl font-medium transition-all duration-300 text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Laptops & Computers
                                </span>
                            </a>
                            
                            <a href="{{ route('shop', ['category' => 'mobile-tablets']) }}" class="filter-btn {{ request('category') == 'mobile-tablets' ? 'active bg-akaat-green text-white shadow-lg' : 'bg-gray-50 border border-gray-200 text-gray-700 hover:border-purple-600 hover:bg-purple-600 hover:text-white' }} px-4 py-2.5 rounded-xl font-medium transition-all duration-300 text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    Mobile & Tablets
                                </span>
                            </a>
                            
                            <a href="{{ route('shop', ['category' => 'office-supplies']) }}" class="filter-btn {{ request('category') == 'office-supplies' ? 'active bg-akaat-green text-white shadow-lg' : 'bg-gray-50 border border-gray-200 text-gray-700 hover:border-brand-orange hover:bg-brand-orange hover:text-white' }} px-4 py-2.5 rounded-xl font-medium transition-all duration-300 text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Office Supplies
                                </span>
                            </a>
                            
                            <a href="{{ route('shop', ['category' => 'tech-accessories']) }}" class="filter-btn {{ request('category') == 'tech-accessories' ? 'active bg-akaat-green text-white shadow-lg' : 'bg-gray-50 border border-gray-200 text-gray-700 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white' }} px-4 py-2.5 rounded-xl font-medium transition-all duration-300 text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 12l2 2 4-4"/>
                                    </svg>
                                    Tech Accessories
                                </span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Sort and View Options -->
                    <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-gray-100">
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600 font-medium">Sort by:</span>
                                <select class="px-3 py-2 rounded-lg border border-gray-200 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-akaat-green focus:border-transparent bg-white">
                                    <option>Popular</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Newest</option>
                                    <option>Rating</option>
                                </select>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600 font-medium">View:</span>
                                <div class="flex items-center gap-1">
                                    <button class="p-2 rounded-lg bg-akaat-green text-white" title="Grid View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                        </svg>
                                    </button>
                                    <button class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200" title="List View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Filter Results Info -->
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-akaat-green rounded-full animate-pulse"></div>
                                <span class="text-gray-700 font-medium text-sm" id="filter-info">Showing {{ $products->count() }} products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="products-grid">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="text-gray-400 text-6xl mb-6">🛒</div>
                        <h3 class="text-2xl font-bold text-gray-600 mb-3">No Products Found</h3>
                        <p class="text-gray-500 mb-6">Try adjusting your filters or check back later for new products.</p>
                        <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-akaat-green text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m22 6-10 7L2 6"/>
                            </svg>
                            View All Products
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="bg-white rounded-xl p-4 shadow-lg border border-gray-100">
                    {{ $products->links() }}
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-br from-akaat-blue via-akaat-blue to-akaat-green">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 lg:p-12 border border-white/20">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6 font-['Plus_Jakarta_Sans']">
                    Stay Updated with Latest Products
                </h2>
                <p class="text-white/90 text-lg lg:text-xl mb-8 font-['Inter'] max-w-2xl mx-auto">
                    Get notified about new arrivals, special offers, and exclusive deals delivered straight to your inbox.
                </p>
                
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto mb-6">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email address" required 
                           class="flex-1 px-6 py-4 rounded-xl border-0 focus:outline-none focus:ring-4 focus:ring-white/30 text-gray-900 font-medium placeholder-gray-500">
                    <button type="submit" class="bg-white text-akaat-blue px-8 py-4 rounded-xl font-bold transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:bg-gray-50">
                        Subscribe Now
                    </button>
                </form>
                
                <div class="flex items-center justify-center gap-6 text-white/80 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        No spam, ever
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Unsubscribe anytime
                    </div>
                </div>
                
                @if(session('success'))
                    <div class="mt-6 bg-green-500/20 border border-green-400/30 text-green-100 px-4 py-3 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('info'))
                    <div class="mt-6 bg-blue-500/20 border border-blue-400/30 text-blue-100 px-4 py-3 rounded-xl">
                        {{ session('info') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Side -->
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-akaat-green/10 rounded-full mb-6 border border-akaat-green/20">
                        <span class="text-akaat-green font-semibold text-sm">🚀 NEED HELP?</span>
                    </div>
                    
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 font-['Plus_Jakarta_Sans']">
                        Need Help Finding the 
                        <span class="text-akaat-green">Perfect Product?</span>
                    </h2>
                    
                    <p class="text-gray-600 text-lg leading-relaxed mb-8 font-['Inter']">
                        Our expert team is here to help you choose the right products for your needs. Get personalized recommendations, bulk pricing options, and technical support.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('contact') }}" class="bg-akaat-green text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-green-200 hover:-translate-y-1 transition duration-300 text-center font-['Plus_Jakarta_Sans']">
                            Contact Our Experts
                        </a>
                        <a href="{{ route('shop.all') }}" class="group bg-white border-2 border-gray-200 text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:border-akaat-green transition duration-300 flex items-center justify-center gap-2 font-['Plus_Jakarta_Sans']">
                            Browse All Products
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
                
                <!-- Right Side -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Trust Indicators -->
                        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition-transform duration-300">
                            <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Guaranteed</h3>
                            <p class="text-gray-600 text-sm">100% authentic products with warranty coverage</p>
                        </div>
                        
                        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition-transform duration-300 mt-8">
                            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Fast Delivery</h3>
                            <p class="text-gray-600 text-sm">Same-day delivery available in Kampala</p>
                        </div>
                        
                        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition-transform duration-300 -mt-4">
                            <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Support</h3>
                            <p class="text-gray-600 text-sm">Technical support and consultation available</p>
                        </div>
                        
                        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 hover:-translate-y-2 transition-transform duration-300 mt-4">
                            <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Best Prices</h3>
                            <p class="text-gray-600 text-sm">Competitive pricing with bulk discounts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Enhanced animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add stagger animation to initial load
            const products = document.querySelectorAll('.product-card');
            products.forEach((product, index) => {
                product.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
            });
            
            // Add wishlist functionality
            document.addEventListener('click', function(e) {
                if (e.target.closest('.wishlist-btn')) {
                    const btn = e.target.closest('.wishlist-btn');
                    const svg = btn.querySelector('svg');
                    const productId = btn.closest('.product-card').dataset.productId;
                    
                    // Toggle wishlist state visually
                    const isWishlisted = svg.classList.contains('text-red-500');
                    
                    if (isWishlisted) {
                        svg.classList.remove('text-red-500');
                        svg.classList.add('text-gray-600');
                        svg.setAttribute('fill', 'none');
                    } else {
                        svg.classList.add('text-red-500');
                        svg.classList.remove('text-gray-600');
                        svg.setAttribute('fill', 'currentColor');
                    }
                    
                    // Add bounce effect
                    btn.style.animation = 'bounce 0.6s ease';
                    setTimeout(() => {
                        btn.style.animation = '';
                    }, 600);
                }
            });
        });
        
        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            /* AKAAT Brand Colors */
            .bg-akaat-blue { background-color: #0F4C81; }
            .bg-akaat-green { background-color: #2ECC71; }
            .bg-akaat-orange { background-color: #F39C12; }
            .text-akaat-blue { color: #0F4C81; }
            .text-akaat-green { color: #2ECC71; }
            .text-akaat-orange { color: #F39C12; }
            .border-akaat-blue { border-color: #0F4C81; }
            .border-akaat-green { border-color: #2ECC71; }
            .border-akaat-orange { border-color: #F39C12; }
            .bg-brand-orange { background-color: #F39C12; }
            .text-brand-orange { color: #F39C12; }
            .border-brand-orange { border-color: #F39C12; }
            
            @keyframes fadeInUp {
                from { 
                    opacity: 0; 
                    transform: translateY(30px) scale(0.95); 
                }
                to { 
                    opacity: 1; 
                    transform: translateY(0) scale(1); 
                }
            }
            
            @keyframes bounce {
                0%, 20%, 60%, 100% { transform: translateY(0) scale(1); }
                40% { transform: translateY(-10px) scale(1.1); }
                80% { transform: translateY(-5px) scale(1.05); }
            }
            
            @keyframes animate-float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-10px) rotate(1deg); }
            }
            
            @keyframes animate-float-delayed {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-15px) rotate(-1deg); }
            }
            
            .animate-float {
                animation: animate-float 3s ease-in-out infinite;
            }
            
            .animate-float-delayed {
                animation: animate-float-delayed 3s ease-in-out infinite;
                animation-delay: 1.5s;
            }
            
            .product-card {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .product-card:hover {
                transform: translateY(-8px) scale(1.01);
                box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
            }
            
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection