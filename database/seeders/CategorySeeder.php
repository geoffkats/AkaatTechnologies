<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Laptops & Computers',
                'slug' => 'laptops',
                'description' => 'Premium laptops, desktops, and workstations for all your computing needs',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'name' => 'Mobile & Tablets',
                'slug' => 'mobile',
                'description' => 'Latest smartphones, tablets, and mobile accessories from top brands',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Office Supplies',
                'slug' => 'office',
                'description' => 'Complete range of office stationery, furniture, and organizational tools',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'name' => 'Tech Accessories',
                'slug' => 'accessories',
                'description' => 'Cables, chargers, cases, and other essential tech accessories',
                'sort_order' => 4,
                'status' => 'active',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
