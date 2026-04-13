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
            Schema::create('ai_analytics', function (Blueprint $table) {
                $table->id(); // Auto Increment [cite: 27]
                $table->string('feature', 50); // Nama fitur (Custom/Matchmaker/Party) [cite: 27]
                $table->text('user_input'); // Apa yang diketik pelanggan ke AI [cite: 27]
                $table->text('ai_output'); // Jawaban yang diberikan Gemini AI [cite: 27]
                $table->timestamps(); // Mencatat created_at secara otomatis [cite: 27]
            });
        } catch (\Exception $e) {
            // Mencatat detail error ke dalam storage/logs/laravel.log
            Log::error("Gagal membuat tabel ai_analytics: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('ai_analytics');
        } catch (\Exception $e) {
            // Mencatat detail error jika proses penghapusan tabel gagal
            Log::error("Gagal menghapus tabel ai_analytics: " . $e->getMessage());
            throw $e;
        }
    }
};
