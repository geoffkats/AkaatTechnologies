@extends('layouts.app')

@section('title', $product->name . ' - Product Details')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="mt-2 text-gray-600">Product Details & Analytics</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('shop.product', $product->slug) }}" target="_blank" class="bg-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-purple-700 transition-colors">
                        View in Shop
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="bg-akaat-green text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 transition-colors">
                        Edit Product
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                        ← Back to Products
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Product Info -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Product Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <p class="text-gray-900">{{ $product->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                            <p class="text-gray-900 font-mono">{{ $product->sku }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <p class="text-gray-900">{{ $product->category->name ?? 'Uncategorized' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($product->status->value === 'active') bg-green-100 text-green-800
                                @elseif($product->status->value === 'inactive') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($product->status->value) }}
                            </span>
                        </div>
                        
                        @if($product->short_description)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                                <p class="text-gray-900">{{ $product->short_description }}</p>
                            </div>
                        @endif
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                            <div class="text-gray-900 whitespace-pre-wrap">{{ $product->description }}</div>
                        </div>
                    </div>
                </div>

                <!-- Pricing & Inventory -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Pricing & Inventory</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Regular Price</label>
                            <p class="text-2xl font-bold text-gray-900">UGX {{ number_format($product->price) }}</p>
                        </div>
                        
                        @if($product->sale_price)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sale Price</label>
                                <p class="text-2xl font-bold text-green-600">UGX {{ number_format($product->sale_price) }}</p>
                                <p class="text-sm text-gray-500">{{ $product->discount_percentage }}% off</p>
                            </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                            <p class="text-xl font-semibold {{ $product->isLowStock() ? 'text-red-600' : 'text-gray-900' }}">
                                {{ $product->stock_quantity }}
                                @if($product->isLowStock())
                                    <span class="text-sm text-red-600 font-normal">(Low Stock)</span>
                                @endif
                            </p>
                        </div>
                        
                        @if($product->low_stock_threshold)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Low Stock Threshold</label>
                                <p class="text-gray-900">{{ $product->low_stock_threshold }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Details -->
                @if($product->weight || $product->dimensions)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Physical Details</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($product->weight)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Weight</label>
                                    <p class="text-gray-900">{{ $product->weight }} kg</p>
                                </div>
                            @endif
                            
                            @if($product->dimensions)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Dimensions</label>
                                    <p class="text-gray-900">{{ $product->dimensions }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Product Images -->
                @if($product->images && count($product->images) > 0)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Product Images</h2>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($product->images as $image)
                                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                                    <img src="{{ $image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Reviews -->
                @if($product->reviews->count() > 0)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Recent Reviews</h2>
                        
                        <div class="space-y-4">
                            @foreach($product->reviews->take(5) as $review)
                                <div class="border-b border-gray-200 pb-4 last:border-b-0">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="font-medium text-gray-900">{{ $review->user->name }}</span>
                                            <div class="flex items-center">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                                    </div>
                                    @if($review->comment)
                                        <p class="text-gray-700">{{ $review->comment }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Stats -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Average Rating</span>
                            <div class="flex items-center space-x-1">
                                <span class="font-semibold">{{ number_format($product->average_rating, 1) }}</span>
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Total Reviews</span>
                            <span class="font-semibold">{{ $product->reviews_count }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Total Orders</span>
                            <span class="font-semibold">{{ $product->orderItems->count() }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Featured</span>
                            <span class="font-semibold {{ $product->featured ? 'text-green-600' : 'text-gray-400' }}">
                                {{ $product->featured ? 'Yes' : 'No' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    
                    <div class="space-y-3">
                        <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-yellow-700 transition-colors">
                                {{ $product->status->value === 'active' ? 'Deactivate' : 'Activate' }} Product
                            </button>
                        </form>
                        
                        <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-purple-700 transition-colors">
                                {{ $product->featured ? 'Remove from Featured' : 'Mark as Featured' }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Product Meta -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Meta</h3>
                    
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="text-gray-600">Created:</span>
                            <span class="font-medium">{{ $product->created_at->format('M d, Y g:i A') }}</span>
                        </div>
                        
                        <div>
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium">{{ $product->updated_at->format('M d, Y g:i A') }}</span>
                        </div>
                        
                        <div>
                            <span class="text-gray-600">Slug:</span>
                            <span class="font-mono text-xs">{{ $product->slug }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection