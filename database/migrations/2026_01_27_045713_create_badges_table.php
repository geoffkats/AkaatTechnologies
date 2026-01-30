<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('icon')->nullable(); // badge icon/image
            $table->string('color')->default('#3B82F6'); // badge color
            $table->string('type')->default('course'); // course, skill, achievement
            $table->json('criteria'); // requirements to earn badge
            $table->boolean('is_active')->default(true);
            $table->integer('points')->default(0); // gamification points
            $table->json('meta_data')->nullable();
            $table->timestamps();

            $table->index(['type', 'is_active']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
