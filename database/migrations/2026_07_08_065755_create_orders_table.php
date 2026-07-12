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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique(); // e.g. INV-001
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('size')->nullable(); // e.g., 5 or 7 pcs
            $table->integer('total_price');
            $table->string('service_type'); // Delivery, Take Away
            $table->text('notes')->nullable();
            $table->string('status')->default('Proses'); // Proses, Perjalanan, Selesai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
