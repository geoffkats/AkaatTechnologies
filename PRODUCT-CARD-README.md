# AKAAT Product Card Component

A reusable, customizable product card component for the AKAAT Technologies e-commerce platform.

## Features

- ✅ **Responsive Design** - Works on all screen sizes
- ✅ **Multiple Layouts** - Vertical and horizontal orientations
- ✅ **Multiple Sizes** - Small, default, and large variants
- ✅ **Interactive Elements** - Wishlist, quick view, and add to cart buttons
- ✅ **Professional Styling** - Matches AKAAT brand colors and design system
- ✅ **Smooth Animations** - Hover effects and transitions
- ✅ **Accessibility** - Proper ARIA labels and keyboard navigation
- ✅ **Customizable** - Show/hide different elements as needed

## Basic Usage

```blade
<!-- Simple usage -->
<x-product-card :product="$product" />

<!-- With custom options -->
<x-product-card 
    :product="$product" 
    card-size="large"
    layout="horizontal"
    :show-wishlist="false"
/>
```

## Component Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `product` | Product Model | required | - | The product model instance |
| `show-quick-actions` | Boolean | `true` | `true`, `false` | Show/hide wishlist and quick view buttons |
| `show-wishlist` | Boolean | `true` | `true`, `false` | Show/hide wishlist button |
| `show-quick-view` | Boolean | `true` | `true`, `false` | Show/hide quick view button |
| `card-size` | String | `default` | `small`, `default`, `large` | Size of the product card |
| `layout` | String | `vertical` | `vertical`, `horizontal` | Layout orientation of the card |

## Examples

### 1. Default Product Grid
```blade
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($products as $product)
        <x-product-card :product="$product" />
    @endforeach
</div>
```

### 2. Small Product Cards (for sidebars)
```blade
<div class="grid grid-cols-2 gap-4">
    @foreach($relatedProducts as $product)
        <x-product-card :product="$product" card-size="small" />
    @endforeach
</div>
```

### 3. Large Featured Products
```blade
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($featuredProducts as $product)
        <x-product-card :product="$product" card-size="large" />
    @endforeach
</div>
```

### 4. Horizontal Product List
```blade
<div class="space-y-6">
    @foreach($products as $product)
        <x-product-card :product="$product" layout="horizontal" card-size="large" />
    @endforeach
</div>
```

### 5. Minimal Cards (no actions)
```blade
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($products as $product)
        <x-product-card 
            :product="$product" 
            :show-quick-actions="false"
        />
    @endforeach
</div>
```

## JavaScript Functions

The component includes JavaScript functions that you can customize:

### `toggleWishlist(productId)`
Called when the wishlist button is clicked.

```javascript
function toggleWishlist(productId) {
    fetch(`/wishlist/toggle/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update UI based on response
        console.log('Wishlist updated:', data);
    });
}
```

### `quickView(productId)`
Called when the quick view button is clicked.

```javascript
function quickView(productId) {
    // Open modal or redirect to product page
    window.location.href = `/shop/product/${productId}`;
}
```

### `quickAdd(productId)` and `addToCart(productId)`
Called when add to cart buttons are clicked.

```javascript
function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Show success message
        console.log('Product added to cart:', data);
    });
}
```

## Required Product Model Attributes

The component expects the following attributes on the Product model:

- `id` - Product ID
- `name` - Product name
- `description` - Product description
- `image_url` - Product image URL (or fallback image will be used)
- `formatted_price` - Formatted price (e.g., "1.5M")
- `formatted_original_price` - Formatted original price (if on sale)
- `formatted_discount_amount` - Formatted discount amount
- `original_price` - Original price for comparison
- `price` - Current price for comparison
- `discount_amount` - Discount amount for display
- `discount_percentage` - Discount percentage for badge
- `stock` - Stock quantity
- `rating` - Average rating (1-5)
- `reviews_count` - Number of reviews
- `featured` - Whether product is featured
- `shipping_type` - Shipping type (e.g., "Free Ship")
- `category` - Related category model with `name` attribute

## Styling

The component uses:
- **AKAAT Brand Colors**: `akaat-blue`, `akaat-green`, `brand-orange`
- **Tailwind CSS**: For responsive design and utilities
- **Custom Animations**: Smooth hover effects and transitions
- **Typography**: Plus Jakarta Sans and Inter fonts

## Demo

Visit `/product-card-examples` to see all the different variations and usage examples.

## File Locations

- **Component**: `resources/views/components/product-card.blade.php`
- **Examples**: `resources/views/components/product-card-examples.blade.php`
- **Usage**: Used in `resources/views/shop/index.blade.php`

## Customization

You can customize the component by:

1. **Modifying the component file** directly for global changes
2. **Using props** to control behavior per usage
3. **Overriding CSS classes** in your stylesheets
4. **Customizing JavaScript functions** for your specific cart/wishlist logic

## Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+

## Performance

- **Optimized images** with proper sizing and lazy loading
- **Efficient animations** using CSS transforms
- **Minimal JavaScript** for better performance
- **Responsive design** without layout shifts