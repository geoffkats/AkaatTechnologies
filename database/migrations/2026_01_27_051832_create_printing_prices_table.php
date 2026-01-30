<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('printing_prices', function (Blueprint $table) {
            $table->id();
            $table->string('paper_type'); // A4, A3, A5, Letter, etc.
            $table->string('paper_size'); // A4, A3, A5, Letter, etc.
            $table->string('color_type'); // black_white, color
            $table->string('print_type'); // single_sided, double_sided
            $table->decimal('price_per_page', 8, 2); // Price per page in UGX
            $table->decimal('bulk_discount_threshold', 8, 2)->nullable(); // Minimum pages for bulk discount
            $table->decimal('bulk_discount_price', 8, 2)->nullable(); // Discounted price per page for bulk
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
            
            // Index for faster queries
            $table->index(['paper_type', 'paper_size', 'color_type', 'print_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printing_prices');
    }
};
