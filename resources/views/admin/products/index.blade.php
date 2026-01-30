@extends('layouts.app')

@section('title', 'Product Management - AKAAT Technologies')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Product Management</h1>
                    <p class="mt-2 text-gray-600">Manage your shop products and inventory</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                        ← Back to Dashboard
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="bg-akaat-green text-white px-6 py-3 rounded-lg font-medium hover:bg-green-600 transition-colors">
                        + Add New Product
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-64">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Search products..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                </div>
                <div>
                    <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <button type="submit" class="bg-akaat-blue text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-800">
                        Clear Filters
                    </a>
                @endif
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            @if($products->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Product</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Category</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Price</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Stock</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($products as $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                                @if($product->primary_image)
                                                    <img src="{{ $product->primary_image }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg">
                                                @else
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <h3 class="font-medium text-gray-900">{{ $product->name }}</h3>
                                                <p class="text-sm text-gray-500">SKU: {{ $product->sku }}</p>
                                                @if($product->featured)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">
                                                        ⭐ Featured
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm">
                                            @if($product->isOnSale())
                                                <span class="text-green-600 font-medium">UGX {{ number_format($product->sale_price) }}</span>
                                                <span class="text-gray-500 line-through ml-2">UGX {{ number_format($product->price) }}</span>
                                            @else
                                                <span class="text-gray-900 font-medium">UGX {{ number_format($product->price) }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm">
                                            <span class="font-medium {{ $product->isLowStock() ? 'text-red-600' : 'text-gray-900' }}">
                                                {{ $product->stock_quantity }}
                                            </span>
                                            @if($product->isLowStock())
                                                <span class="text-red-600 text-xs block">Low Stock</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($product->status->value === 'active') bg-green-100 text-green-800
                                            @elseif($product->status->value === 'inactive') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ ucfirst($product->status->value) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.products.show', $product) }}" 
                                               class="text-akaat-blue hover:text-blue-700 text-sm font-medium">
                                                View
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                               class="text-green-600 hover:text-green-700 text-sm font-medium">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">
                                                    {{ $product->status->value === 'active' ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.products.toggle-featured', $product) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                                                    {{ $product->featured ? 'Unfeature' : 'Feature' }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                    <p class="text-gray-600 mb-6">Get started by adding your first product to the shop.</p>
                    <a href="{{ route('admin.products.create') }}" class="bg-akaat-green text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                        Add Your First Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection