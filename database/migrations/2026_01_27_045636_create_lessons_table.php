<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->json('attachments')->nullable(); // PDFs, documents, etc.
            $table->integer('duration_minutes')->default(0);
            $table->integer('sort_order')->default(0);
            $table->string('type')->default('video'); // video, text, quiz, assignment
            $table->boolean('is_free')->default(false);
            $table->boolean('is_published')->default(true);
            $table->json('meta_data')->nullable();
            $table->timestamps();

            $table->index(['course_id', 'sort_order']);
            $table->index(['course_id', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
