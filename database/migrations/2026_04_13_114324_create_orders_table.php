<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Menambahkan facade Log untuk mencatat pesan kesalahan

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::create('orders', function (Blueprint $table) {
                $table->string('id', 50)->primary(); // ID Invoice unik (Contoh: INV-2026-001)
                $table->string('customer_wa', 20); // Nomor WhatsApp pelanggan
                $table->string('product_name', 100); // Nama menu yang dipilih
                $table->integer('box_size'); // Jumlah donat per kotak
                $table->integer('quantity'); // Jumlah kotak yang dibeli
                $table->decimal('subtotal', 10, 2); // Harga total produk
                $table->decimal('shipping_fee', 10, 2); // Ongkos kirim
                $table->decimal('grand_total', 10, 2); // Total akhir pembayaran
                $table->enum('method', ['takeaway', 'delivery']); // Metode pengambilan
                $table->string('pickup_code', 10)->nullable(); // Kode unik ambil di toko
                $table->text('maps_link')->nullable(); // Lokasi GPS pelanggan
                $table->text('gift_card')->nullable(); // Pesan dari AI
                $table->enum('status', ['pending', 'paid', 'processing', 'shipped']); // Status pesanan
                $table->timestamps(); // Mencatat created_at dan updated_at secara otomatis
            });
        } catch (\Exception $e) {
            // Mencatat detail error ke dalam storage/logs/laravel.log
            Log::error("Gagal membuat tabel orders: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('orders');
        } catch (\Exception $e) {
            // Mencatat detail error jika proses penghapusan tabel gagal
            Log::error("Gagal menghapus tabel orders: " . $e->getMessage());
            throw $e;
        }
    }
};
