<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'AKAAT Admin',
            'email' => 'admin@akaattech.com',
            'role' => 'admin',
            'phone' => '+233 XX XXX XXXX',
        ]);

        // Create test customer
        User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'role' => 'customer',
            'phone' => '+233 XX XXX XXXX',
        ]);

        // Seed categories, services, pages, portfolio, and products
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
            PageSeeder::class,
            PortfolioSeeder::class,
            PrintingPriceSeeder::class,
            CourseSeeder::class,
            BadgeSeeder::class,
        ]);
    }
}
