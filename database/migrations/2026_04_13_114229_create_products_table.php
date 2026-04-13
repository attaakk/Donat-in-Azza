<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Memastikan fitur pencatatan log aktif

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::create('products', function (Blueprint $table) {
                $table->id(); // Auto Increment [cite: 15]
                $table->string('name', 100); // Nama donat [cite: 15]
                $table->string('slug', 100); // URL unik [cite: 15]
                $table->text('description'); // Penjelasan rasa [cite: 15]
                $table->decimal('base_price_5pcs', 10, 2); // Harga 1 kotak isi 5 [cite: 15]
                $table->decimal('extra_price', 10, 2); // Harga tambahan per biji [cite: 15]
                $table->string('image_path', 255); // Lokasi file gambar [cite: 15]
                $table->boolean('is_active')->default(true); // Status tersedia [cite: 15]
                $table->timestamps();
            });
        } catch (\Exception $e) {
            // Mencatat detail kesalahan jika migrasi gagal
            Log::error("Gagal membuat tabel products: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('products');
        } catch (\Exception $e) {
            Log::error("Gagal menghapus tabel products: " . $e->getMessage());
            throw $e;
        }
    }
};
