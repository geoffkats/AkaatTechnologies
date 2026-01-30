<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video_preview')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('level')->default('beginner'); // beginner, intermediate, advanced
            $table->string('category');
            $table->integer('duration_hours')->default(0);
            $table->integer('total_lessons')->default(0);
            $table->json('learning_outcomes')->nullable();
            $table->json('prerequisites')->nullable();
            $table->string('status')->default('draft'); // draft, published, archived
            $table->boolean('featured')->default(false);
            $table->integer('max_students')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('schedule')->nullable(); // days and times
            $table->string('instructor_name');
            $table->text('instructor_bio')->nullable();
            $table->string('instructor_image')->nullable();
            $table->json('meta_data')->nullable();
            $table->timestamps();

            $table->index(['status', 'featured']);
            $table->index(['category', 'level']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
