<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Memastikan facade Log aktif untuk mencatat kesalahan

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::create('subscribers', function (Blueprint $table) {
                $table->id(); // Auto Increment
                $table->string('email', 150)->unique(); // Alamat email unik
                $table->string('promo_code', 20)->nullable(); // Kode diskon dari AI
                $table->timestamps(); // Waktu mendaftar
            });
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan ke storage/logs/laravel.log jika migrasi gagal
            Log::error("Gagal membuat tabel subscribers: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('subscribers');
        } catch (\Exception $e) {
            Log::error("Gagal menghapus tabel subscribers: " . $e->getMessage());
            throw $e;
        }
    }
};
