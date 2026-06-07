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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('navbar_title')->nullable();
            $table->boolean('show_in_navbar')->default(false);
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('banner_image_path')->nullable();
            $table->longText('content')->nullable();
            $table->string('position')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_default')->default(false);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
