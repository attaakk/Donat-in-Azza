<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Menambahkan ini untuk mencatat error ke log

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                $table->id();
                $table->morphs('tokenable');
                $table->text('name');
                $table->string('token', 64)->unique();
                $table->text('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamp('expires_at')->nullable()->index();
                $table->timestamps();
            });
        } catch (\Exception $e) {
            // Jika gagal, Laravel akan mencatat pesan errornya tanpa menghentikan sistem secara paksa
            Log::error("Gagal membuat tabel personal_access_tokens: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Schema::dropIfExists('personal_access_tokens');
        } catch (\Exception $e) {
            Log::error("Gagal menghapus tabel personal_access_tokens: " . $e->getMessage());
            throw $e;
        }
    }
};
