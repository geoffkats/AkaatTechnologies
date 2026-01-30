@extends('layouts.app')

@section('title', 'Shop Categories - AKAAT Technologies')
@section('description', 'Browse our product categories including tech products, office supplies, and accessories.')

@section('breadcrumbs')
<x-breadcrumb :items="[
    ['title' => 'Shop', 'url' => route('shop')],
    ['title' => 'Categories', 'url' => route('shop.categories')]
]" />
@endsection

@section('content')
    <!-- Header Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-10">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-green-50 rounded-lg mb-6 border border-green-100">
                    <span class="text-akaat-green font-bold text-xs">📂 CATEGORIES</span>
                </div>
                
                <h1 class="text-5xl font-bold text-[#111827] leading-tight font-['Plus_Jakarta_Sans'] mb-6">
                    Product <span class="text-akaat-green italic">Categories</span>
                </h1>
                
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-['Inter']">
                    Explore our organized product categories to find exactly what you need for your business or personal use.
                </p>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($categories as $category)
                    <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <!-- Category Image -->
                        <div class="relative overflow-hidden h-48">
                            @if($category->image_url)
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-akaat-green/10 to-akaat-blue/10 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Product Count Badge -->
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full">
                                <span class="text-sm font-bold text-akaat-green">{{ $category->products_count }} items</span>
                            </div>
                        </div>
                        
                        <!-- Category Info -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                {{ $category->name }}
                            </h3>
                            
                            @if($category->description)
                                <p class="text-gray-600 mb-6 font-['Inter']">
                                    {{ $category->description }}
                                </p>
                            @endif
                            
                            <!-- Featured Products Preview -->
                            @if($category->products->count() > 0)
                                <div class="mb-6">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Featured Products:</h4>
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach($category->products->take(4) as $product)
                                            <div class="bg-gray-50 rounded-lg p-2 text-center">
                                                <div class="text-xs font-medium text-gray-700 truncate">{{ $product->name }}</div>
                                                <div class="text-xs text-akaat-green font-bold">UGX {{ number_format($product->price) }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Browse Button -->
                            <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                               class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Browse {{ $category->name }}
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Default Categories when none exist in database -->
                    <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <div class="relative overflow-hidden h-48">
                            <div class="w-full h-full bg-gradient-to-br from-akaat-blue/10 to-akaat-green/10 flex items-center justify-center">
                                <svg class="w-16 h-16 text-akaat-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full">
                                <span class="text-sm font-bold text-akaat-blue">125+ items</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                Laptops & Computers
                            </h3>
                            <p class="text-gray-600 mb-6 font-['Inter']">
                                High-performance laptops, desktops, and computer accessories for work and gaming.
                            </p>
                            <a href="{{ route('shop', ['category' => 'laptops']) }}" 
                               class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Browse Laptops
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <div class="relative overflow-hidden h-48">
                            <div class="w-full h-full bg-gradient-to-br from-akaat-green/10 to-brand-orange/10 flex items-center justify-center">
                                <svg class="w-16 h-16 text-akaat-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full">
                                <span class="text-sm font-bold text-akaat-green">180+ items</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                Mobile Devices
                            </h3>
                            <p class="text-gray-600 mb-6 font-['Inter']">
                                Latest smartphones, tablets, and mobile accessories from top brands.
                            </p>
                            <a href="{{ route('shop', ['category' => 'mobile']) }}" 
                               class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Browse Mobile
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <div class="relative overflow-hidden h-48">
                            <div class="w-full h-full bg-gradient-to-br from-brand-orange/10 to-akaat-blue/10 flex items-center justify-center">
                                <svg class="w-16 h-16 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full">
                                <span class="text-sm font-bold text-brand-orange">95+ items</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                Office Supplies
                            </h3>
                            <p class="text-gray-600 mb-6 font-['Inter']">
                                Complete office solutions including furniture, stationery, and equipment.
                            </p>
                            <a href="{{ route('shop', ['category' => 'office']) }}" 
                               class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Browse Office
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white rounded-[24px] shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2 overflow-hidden">
                        <div class="relative overflow-hidden h-48">
                            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-akaat-green/10 flex items-center justify-center">
                                <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2M9 12l2 2 4-4"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full">
                                <span class="text-sm font-bold text-purple-600">100+ items</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-[#111827] mb-3 font-['Plus_Jakarta_Sans'] group-hover:text-akaat-blue transition-colors">
                                Accessories
                            </h3>
                            <p class="text-gray-600 mb-6 font-['Inter']">
                                Essential tech accessories including cables, cases, keyboards, and more.
                            </p>
                            <a href="{{ route('shop', ['category' => 'accessories']) }}" 
                               class="w-full bg-akaat-green hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Browse Accessories
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-10 text-center">
            <div class="bg-gradient-to-br from-akaat-green/5 to-akaat-blue/5 rounded-[40px] p-12 border border-gray-100">
                <h2 class="text-4xl font-bold text-[#111827] mb-6 font-['Plus_Jakarta_Sans']">
                    Ready to <span class="text-akaat-green italic">Shop?</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 font-['Inter']">
                    Explore our complete product catalog or get in touch for personalized recommendations.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('shop.all') }}" class="bg-akaat-green hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-bold transition-colors">
                        View All Products
                    </a>
                    <a href="{{ route('contact') }}" class="bg-white border-2 border-gray-200 hover:border-akaat-green text-gray-700 hover:text-akaat-green px-8 py-4 rounded-2xl font-bold transition-colors">
                        Get Help
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection