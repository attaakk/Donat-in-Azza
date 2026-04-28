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
    Schema::create('subscribers', function (Blueprint $table) {
        // Primary Key, Auto Increment
        $table->id();
        
        // Email pendaftar (dibatasi UNIQUE agar tidak dobel)
        $table->string('email', 100)->unique();
        
        // Standar Laravel untuk mencatat waktu (created_at dan updated_at)
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
