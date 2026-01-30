<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\ProductStatus;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            // Laptops & Computers
            [
                'name' => 'MacBook Pro M3',
                'description' => 'The most advanced MacBook Pro ever. Supercharged by M3 Pro and M3 Max chips. Built for all the ways you work, play, and create.',
                'short_description' => '14-inch, 8GB RAM, 512GB SSD',
                'price' => 9200000,
                'sale_price' => 8500000,
                'stock_quantity' => 15,
                'category_id' => $categories['laptops']->id,
                'status' => ProductStatus::Active,
                'featured' => true,
                'images' => ['https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Apple', 'model' => 'MacBook Pro M3', 'warranty' => '1 Year']
            ],
            [
                'name' => 'ASUS ROG Gaming Laptop',
                'description' => 'High-performance gaming laptop with RTX 4060 graphics card, perfect for gaming and creative work.',
                'short_description' => 'RTX 4060, 16GB RAM, 1TB SSD',
                'price' => 6500000,
                'stock_quantity' => 8,
                'category_id' => $categories['laptops']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1603302576837-37561b2e2302?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'ASUS', 'model' => 'ROG Gaming', 'warranty' => '2 Years']
            ],
            [
                'name' => 'Lenovo ThinkPad',
                'description' => 'Business-grade laptop designed for professionals. Reliable, secure, and built to last.',
                'short_description' => 'Intel i7, 16GB RAM, 512GB SSD',
                'price' => 4800000,
                'stock_quantity' => 12,
                'category_id' => $categories['laptops']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1496181133206-80ce9b88a853?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Lenovo', 'model' => 'ThinkPad', 'warranty' => '3 Years']
            ],

            // Mobile & Tablets
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'The ultimate iPhone with titanium design, advanced camera system, and A17 Pro chip.',
                'short_description' => '256GB, Titanium Blue',
                'price' => 4200000,
                'stock_quantity' => 25,
                'category_id' => $categories['mobile']->id,
                'status' => ProductStatus::Active,
                'featured' => true,
                'images' => ['https://images.unsplash.com/photo-1592750475338-74b7b21085ab?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Apple', 'model' => 'iPhone 15 Pro', 'warranty' => '1 Year']
            ],
            [
                'name' => 'Samsung Galaxy Tab S9',
                'description' => 'Premium Android tablet with S Pen included. Perfect for productivity and creativity.',
                'short_description' => '11-inch, 128GB, Wi-Fi + Cellular',
                'price' => 2800000,
                'stock_quantity' => 18,
                'category_id' => $categories['mobile']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Samsung', 'model' => 'Galaxy Tab S9', 'warranty' => '1 Year']
            ],

            // Office Supplies
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'Premium ergonomic office chair with lumbar support, adjustable height, and breathable mesh back.',
                'short_description' => 'Adjustable height, lumbar support',
                'price' => 850000,
                'stock_quantity' => 30,
                'category_id' => $categories['office']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'ErgoMax', 'warranty' => '5 Years']
            ],
            [
                'name' => 'HP LaserJet Pro',
                'description' => 'Professional laser printer with wireless connectivity, duplex printing, and scanning capabilities.',
                'short_description' => 'Wireless, Duplex printing, Scanner',
                'price' => 1200000,
                'stock_quantity' => 15,
                'category_id' => $categories['office']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'HP', 'model' => 'LaserJet Pro', 'warranty' => '1 Year']
            ],
            [
                'name' => 'Premium Notebook Set',
                'description' => 'High-quality notebook set with premium paper, perfect for meetings, notes, and planning.',
                'short_description' => 'A4 size, 200 pages, set of 3',
                'price' => 45000,
                'stock_quantity' => 100,
                'category_id' => $categories['office']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'PremiumPaper', 'pages' => 200]
            ],
            [
                'name' => 'Executive Office Desk',
                'description' => 'L-shaped executive desk with built-in drawers and cable management. Oak finish.',
                'short_description' => 'L-shaped, Built-in drawers, Oak finish',
                'price' => 1500000,
                'stock_quantity' => 5,
                'category_id' => $categories['office']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['material' => 'Oak Wood', 'warranty' => '2 Years']
            ],

            // Tech Accessories
            [
                'name' => 'Wireless Headphones',
                'description' => 'Premium wireless headphones with active noise cancellation and 30-hour battery life.',
                'short_description' => 'Noise cancelling, 30hr battery',
                'price' => 600000,
                'sale_price' => 420000,
                'stock_quantity' => 40,
                'category_id' => $categories['accessories']->id,
                'status' => ProductStatus::Active,
                'featured' => true,
                'images' => ['https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'AudioTech', 'battery' => '30 hours', 'warranty' => '2 Years']
            ],
            [
                'name' => 'Dell 27" 4K Monitor',
                'description' => '27-inch 4K UHD monitor with USB-C connectivity and height-adjustable stand.',
                'short_description' => '4K UHD, USB-C, Height adjustable',
                'price' => 1800000,
                'stock_quantity' => 20,
                'category_id' => $categories['accessories']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Dell', 'size' => '27 inch', 'resolution' => '4K UHD', 'warranty' => '3 Years']
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with blue switches and wireless connectivity.',
                'short_description' => 'RGB Backlit, Blue switches, Wireless',
                'price' => 320000,
                'stock_quantity' => 35,
                'category_id' => $categories['accessories']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1541140532154-b024d705b90a?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'MechKeys', 'switches' => 'Blue', 'backlight' => 'RGB', 'warranty' => '2 Years']
            ],
            [
                'name' => 'Logitech MX Master',
                'description' => 'Advanced wireless mouse with ergonomic design and multi-device connectivity.',
                'short_description' => 'Wireless, Ergonomic, Multi-device',
                'price' => 280000,
                'stock_quantity' => 50,
                'category_id' => $categories['accessories']->id,
                'status' => ProductStatus::Active,
                'featured' => false,
                'images' => ['https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?q=80&w=400&auto=format&fit=crop'],
                'meta_data' => ['brand' => 'Logitech', 'model' => 'MX Master', 'connectivity' => 'Wireless', 'warranty' => '1 Year']
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
