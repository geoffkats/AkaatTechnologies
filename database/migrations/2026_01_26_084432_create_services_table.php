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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // printing, web_development, software_development, training
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->json('features')->nullable();
            $table->json('pricing')->nullable(); // flexible pricing structure
            $table->string('delivery_time')->nullable();
            $table->string('status')->default('active');
            $table->boolean('featured')->default(false);
            $table->json('portfolio')->nullable(); // portfolio items/case studies
            $table->json('meta_data')->nullable();
            $table->timestamps();

            $table->index(['category', 'status']);
            $table->index(['status', 'featured']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
