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
    Schema::create('ai_logs', function (Blueprint $table) {
        // Primary Key, Auto Increment
        $table->id();
        
        // Kategori fitur AI
        $table->enum('feature_type', ['custom_recipe', 'matchmaker', 'party']);
        
        // Apa yang diketikkan oleh pengunjung
        $table->text('user_prompt');
        
        // Jawaban mentah yang dikembalikan oleh AI Gemini
        $table->text('ai_response');
        
        // Waktu eksekusi
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_logs');
    }
};
