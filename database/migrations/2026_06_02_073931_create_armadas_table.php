<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // Nama bus
            $table->string('capacity');                 // e.g. "40-60 Seat"
            $table->string('image_path')->nullable();   // Foto bus
            $table->string('price_label')->nullable();  // e.g. "Mulai Rp 3.500.000/hari"
            $table->json('features')->nullable();       // ["AC", "Karaoke", ...]
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
};
