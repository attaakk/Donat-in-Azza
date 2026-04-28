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
    Schema::create('products', function (Blueprint $table) {
        // Primary Key, Auto Increment
        $table->id(); 
        
        // Nama produk Donat
        $table->string('name', 100); 
        
        // Teks deskripsi dan rasa produk
        $table->text('description'); 
        
        // Harga dasar untuk 1 kotak standar
        $table->decimal('price_base', 10, 2); 
        
        // Harga untuk penambahan donat per biji secara satuan
        $table->decimal('price_extra', 10, 2); 
        
        // Jalur path atau tautan file foto produk
        $table->string('image_url', 255); 
        
        // Status stok ketersediaan
        $table->boolean('is_active');
        
        // Standar Laravel untuk mencatat waktu data dibuat
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
