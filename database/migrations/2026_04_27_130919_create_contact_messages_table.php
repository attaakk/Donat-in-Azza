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
    Schema::create('contact_messages', function (Blueprint $table) {
        // Primary Key, Auto Increment
        $table->id();
        
        // Nama orang yang mengirim pertanyaan
        $table->string('sender_name', 100);
        
        // Alamat email pengirim pesan
        $table->string('sender_email', 100);
        
        // Kategori pesan (Pesanan Khusus / Custom / Tanya Admin)
        $table->string('subject', 100);
        
        // Isi lengkap pesan keluhan atau pertanyaan
        $table->text('message');
        
        // Penanda status apakah pesan sudah dibaca Admin (default: belum dibaca/false)
        $table->boolean('is_read')->default(false);
        
        // Standar Laravel untuk mencatat waktu (created_at dan updated_at)
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
