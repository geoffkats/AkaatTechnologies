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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('category', ['printing', 'web', 'software', 'training', 'all'])->default('all');
            $table->enum('type', ['image', 'video'])->default('image');
            $table->string('media_url'); // For images or YouTube URLs
            $table->string('thumbnail_url')->nullable(); // For video thumbnails
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true); // active/inactive
            $table->integer('sort_order')->default(0);
            $table->json('meta_data')->nullable(); // Additional data like client name, project date, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
