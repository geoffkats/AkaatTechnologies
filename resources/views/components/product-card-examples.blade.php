{{-- 
    AKAAT Product Card Component Examples
    
    This file shows different ways to use the product-card component
    You can copy these examples into your Blade templates
--}}

@extends('layouts.app')

@section('title', 'Product Card Examples')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Product Card Examples</h1>
    
    {{-- Example 1: Default Product Card --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">1. Default Product Card</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 2: Small Product Cards --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">2. Small Product Cards</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
            @foreach($products->take(6) as $product)
                <x-product-card :product="$product" card-size="small" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" card-size="small" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 3: Large Product Cards --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">3. Large Product Cards</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products->take(3) as $product)
                <x-product-card :product="$product" card-size="large" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" card-size="large" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 4: Horizontal Product Cards --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">4. Horizontal Product Cards</h2>
        <div class="space-y-6">
            @foreach($products->take(3) as $product)
                <x-product-card :product="$product" layout="horizontal" card-size="large" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" layout="horizontal" card-size="large" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 5: Cards without Quick Actions --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">5. Cards without Quick Actions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
                <x-product-card :product="$product" :show-quick-actions="false" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" :show-quick-actions="false" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 6: Cards with only Wishlist --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">6. Cards with only Wishlist</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
                <x-product-card :product="$product" :show-quick-view="false" />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" :show-quick-view="false" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Example 7: Minimal Cards --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">7. Minimal Cards (No Actions)</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products->take(4) as $product)
                <x-product-card 
                    :product="$product" 
                    :show-quick-actions="false"
                    :show-wishlist="false"
                    :show-quick-view="false" 
                />
            @endforeach
        </div>
        <div class="mt-4 p-4 bg-gray-100 rounded-lg">
            <code class="text-sm">
                &lt;x-product-card :product="$product" :show-quick-actions="false" :show-wishlist="false" :show-quick-view="false" /&gt;
            </code>
        </div>
    </section>
    
    {{-- Component Props Documentation --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Component Props</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2 font-semibold">Prop</th>
                        <th class="text-left py-2 font-semibold">Type</th>
                        <th class="text-left py-2 font-semibold">Default</th>
                        <th class="text-left py-2 font-semibold">Options</th>
                        <th class="text-left py-2 font-semibold">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 font-mono">product</td>
                        <td class="py-2">Product Model</td>
                        <td class="py-2">required</td>
                        <td class="py-2">-</td>
                        <td class="py-2">The product model instance</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-mono">show-quick-actions</td>
                        <td class="py-2">Boolean</td>
                        <td class="py-2">true</td>
                        <td class="py-2">true, false</td>
                        <td class="py-2">Show/hide wishlist and quick view buttons</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-mono">show-wishlist</td>
                        <td class="py-2">Boolean</td>
                        <td class="py-2">true</td>
                        <td class="py-2">true, false</td>
                        <td class="py-2">Show/hide wishlist button</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-mono">show-quick-view</td>
                        <td class="py-2">Boolean</td>
                        <td class="py-2">true</td>
                        <td class="py-2">true, false</td>
                        <td class="py-2">Show/hide quick view button</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-mono">card-size</td>
                        <td class="py-2">String</td>
                        <td class="py-2">default</td>
                        <td class="py-2">small, default, large</td>
                        <td class="py-2">Size of the product card</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-mono">layout</td>
                        <td class="py-2">String</td>
                        <td class="py-2">vertical</td>
                        <td class="py-2">vertical, horizontal</td>
                        <td class="py-2">Layout orientation of the card</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    
    {{-- JavaScript Functions Documentation --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">JavaScript Functions</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="space-y-4">
                <div>
                    <h3 class="font-semibold text-lg mb-2">toggleWishlist(productId)</h3>
                    <p class="text-gray-600 mb-2">Called when the wishlist button is clicked. Implement your wishlist toggle logic here.</p>
                    <div class="bg-gray-100 p-3 rounded">
                        <code class="text-sm">
                            function toggleWishlist(productId) {<br>
                            &nbsp;&nbsp;// Your wishlist logic here<br>
                            }
                        </code>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-2">quickView(productId)</h3>
                    <p class="text-gray-600 mb-2">Called when the quick view button is clicked. Implement your quick view modal or redirect logic here.</p>
                    <div class="bg-gray-100 p-3 rounded">
                        <code class="text-sm">
                            function quickView(productId) {<br>
                            &nbsp;&nbsp;// Your quick view logic here<br>
                            }
                        </code>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-2">quickAdd(productId)</h3>
                    <p class="text-gray-600 mb-2">Called when the "Quick Add" button is clicked. Implement your quick add to cart logic here.</p>
                    <div class="bg-gray-100 p-3 rounded">
                        <code class="text-sm">
                            function quickAdd(productId) {<br>
                            &nbsp;&nbsp;// Your quick add logic here<br>
                            }
                        </code>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-2">addToCart(productId)</h3>
                    <p class="text-gray-600 mb-2">Called when the main "Add to Cart" button is clicked. Implement your add to cart logic here.</p>
                    <div class="bg-gray-100 p-3 rounded">
                        <code class="text-sm">
                            function addToCart(productId) {<br>
                            &nbsp;&nbsp;// Your add to cart logic here<br>
                            }
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection