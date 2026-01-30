@extends('layouts.app')

@section('title', 'Add New Product - AKAAT Technologies')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Add New Product</h1>
                    <p class="mt-2 text-gray-600">Create a new product for your shop</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                    ← Back to Products
                </a>
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.products.store') }}" class="space-y-8">
            @csrf
            
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Basic Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                        <select id="category_id" name="category_id" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                        <textarea id="short_description" name="short_description" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Full Description *</label>
                        <textarea id="description" name="description" rows="6" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Pricing & Inventory</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Regular Price (UGX) *</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" step="0.01" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-2">Sale Price (UGX)</label>
                        <input type="number" id="sale_price" name="sale_price" value="{{ old('sale_price') }}" min="0" step="0.01"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('sale_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                        <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" min="0" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('stock_quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="low_stock_threshold" class="block text-sm font-medium text-gray-700 mb-2">Low Stock Threshold</label>
                        <input type="number" id="low_stock_threshold" name="low_stock_threshold" value="{{ old('low_stock_threshold', 5) }}" min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('low_stock_threshold')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Product Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                        <input type="number" id="weight" name="weight" value="{{ old('weight') }}" min="0" step="0.01"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('weight')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-2">Dimensions (L x W x H)</label>
                        <input type="text" id="dimensions" name="dimensions" value="{{ old('dimensions') }}" placeholder="e.g., 10 x 5 x 3 cm"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                        @error('dimensions')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                                   class="h-4 w-4 text-akaat-blue focus:ring-akaat-blue border-gray-300 rounded">
                            <label for="featured" class="ml-2 block text-sm text-gray-900">
                                Featured Product (will be highlighted on the homepage)
                            </label>
                        </div>
                        @error('featured')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Product Images</h2>
                
                <div id="image-inputs">
                    <div class="image-input-group mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image URL 1</label>
                        <div class="flex gap-2">
                            <input type="url" name="images[]" value="{{ old('images.0') }}" placeholder="https://example.com/image.jpg"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
                            <button type="button" onclick="removeImageInput(this)" class="px-4 py-2 text-red-600 hover:text-red-700 font-medium">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                
                <button type="button" onclick="addImageInput()" class="text-akaat-blue hover:text-blue-700 font-medium">
                    + Add Another Image
                </button>
                
                @error('images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="bg-akaat-green text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addImageInput() {
    const container = document.getElementById('image-inputs');
    const count = container.children.length + 1;
    
    const div = document.createElement('div');
    div.className = 'image-input-group mb-4';
    div.innerHTML = `
        <label class="block text-sm font-medium text-gray-700 mb-2">Image URL ${count}</label>
        <div class="flex gap-2">
            <input type="url" name="images[]" placeholder="https://example.com/image.jpg"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-akaat-blue focus:border-akaat-blue">
            <button type="button" onclick="removeImageInput(this)" class="px-4 py-2 text-red-600 hover:text-red-700 font-medium">
                Remove
            </button>
        </div>
    `;
    
    container.appendChild(div);
}

function removeImageInput(button) {
    const container = document.getElementById('image-inputs');
    if (container.children.length > 1) {
        button.closest('.image-input-group').remove();
        
        // Update labels
        const groups = container.querySelectorAll('.image-input-group');
        groups.forEach((group, index) => {
            const label = group.querySelector('label');
            label.textContent = `Image URL ${index + 1}`;
        });
    }
}
</script>
@endsection