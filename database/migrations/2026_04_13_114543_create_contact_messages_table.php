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
            Schema::create('contact_messages', function (Blueprint $table) {
                $table->id(); // Auto Increment
                $table->string('name', 100); // Nama pengirim
                $table->string('email', 100); // Email pengirim
                $table->text('message'); // Isi pertanyaan
                $table->boolean('is_replied')->default(false); // Status apakah sudah dibalas admin
                $table->timestamps(); // Mencatat waktu masuk pesan secara otomatis
            });
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan ke storage/logs/laravel.log jika migrasi gagal
            Log::error("Gagal membuat tabel contact_messages: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('contact_messages');
        } catch (\Exception $e) {
            Log::error("Gagal menghapus tabel contact_messages: " . $e->getMessage());
            throw $e;
        }
    }
};
