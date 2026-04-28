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
    Schema::create('testimonials', function (Blueprint $table) {
        // Primary Key, Auto Increment
        $table->id();
        
        // Nama pembeli yang memberikan ulasan
        $table->string('name', 100);
        
        // Keterangan spesifik (Misal: 'Langganan Tetap')
        $table->string('title', 100);
        
        // Isi narasi testimoni lengkap
        $table->text('content');
        
        // Huruf inisial awal untuk pembuatan ikon profil visual
        $table->char('avatar', 1);
        
        // Standar Laravel untuk mencatat waktu (opsional tapi baik untuk tracking)
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
