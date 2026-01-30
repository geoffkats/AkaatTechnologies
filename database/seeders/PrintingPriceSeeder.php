<?php

namespace Database\Seeders;

use App\Models\PrintingPrice;
use Illuminate\Database\Seeder;

class PrintingPriceSeeder extends Seeder
{
    public function run(): void
    {
        $prices = [
            // A4 Paper Prices
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A4',
                'color_type' => 'black_white',
                'print_type' => 'single_sided',
                'price_per_page' => 200,
                'bulk_discount_threshold' => 100,
                'bulk_discount_price' => 150,
                'description' => 'A4 Black & White Single-sided printing'
            ],
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A4',
                'color_type' => 'black_white',
                'print_type' => 'double_sided',
                'price_per_page' => 300,
                'bulk_discount_threshold' => 100,
                'bulk_discount_price' => 250,
                'description' => 'A4 Black & White Double-sided printing'
            ],
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A4',
                'color_type' => 'color',
                'print_type' => 'single_sided',
                'price_per_page' => 500,
                'bulk_discount_threshold' => 50,
                'bulk_discount_price' => 400,
                'description' => 'A4 Color Single-sided printing'
            ],
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A4',
                'color_type' => 'color',
                'print_type' => 'double_sided',
                'price_per_page' => 800,
                'bulk_discount_threshold' => 50,
                'bulk_discount_price' => 650,
                'description' => 'A4 Color Double-sided printing'
            ],

            // A3 Paper Prices
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A3',
                'color_type' => 'black_white',
                'print_type' => 'single_sided',
                'price_per_page' => 400,
                'bulk_discount_threshold' => 50,
                'bulk_discount_price' => 350,
                'description' => 'A3 Black & White Single-sided printing'
            ],
            [
                'paper_type' => 'Standard',
                'paper_size' => 'A3',
                'color_type' => 'color',
                'print_type' => 'single_sided',
                'price_per_page' => 1000,
                'bulk_discount_threshold' => 25,
                'bulk_discount_price' => 850,
                'description' => 'A3 Color Single-sided printing'
            ],

            // Premium Paper Prices
            [
                'paper_type' => 'Premium',
                'paper_size' => 'A4',
                'color_type' => 'black_white',
                'print_type' => 'single_sided',
                'price_per_page' => 300,
                'bulk_discount_threshold' => 100,
                'bulk_discount_price' => 250,
                'description' => 'A4 Premium Paper Black & White Single-sided'
            ],
            [
                'paper_type' => 'Premium',
                'paper_size' => 'A4',
                'color_type' => 'color',
                'print_type' => 'single_sided',
                'price_per_page' => 700,
                'bulk_discount_threshold' => 50,
                'bulk_discount_price' => 600,
                'description' => 'A4 Premium Paper Color Single-sided'
            ],

            // Photo Paper Prices
            [
                'paper_type' => 'Photo',
                'paper_size' => 'A4',
                'color_type' => 'color',
                'print_type' => 'single_sided',
                'price_per_page' => 1500,
                'bulk_discount_threshold' => 20,
                'bulk_discount_price' => 1200,
                'description' => 'A4 Photo Paper Color printing'
            ],
            [
                'paper_type' => 'Photo',
                'paper_size' => '4x6',
                'color_type' => 'color',
                'print_type' => 'single_sided',
                'price_per_page' => 800,
                'bulk_discount_threshold' => 50,
                'bulk_discount_price' => 600,
                'description' => '4x6 Photo printing'
            ],

            // Business Card Prices
            [
                'paper_type' => 'Card Stock',
                'paper_size' => 'Business Card',
                'color_type' => 'color',
                'print_type' => 'double_sided',
                'price_per_page' => 100,
                'bulk_discount_threshold' => 500,
                'bulk_discount_price' => 80,
                'description' => 'Business Cards (per card)'
            ],
        ];

        foreach ($prices as $price) {
            PrintingPrice::create($price);
        }
    }
}
