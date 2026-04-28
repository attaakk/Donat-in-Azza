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
        // Primary Key berupa Invoice ID [cite: 24]
        $table->string('id', 50)->primary(); 
        
        $table->string('customer_wa', 20); // Nomor WA [cite: 24]
        $table->string('product_name', 100); // Nama donat [cite: 24]
        $table->integer('box_size'); // Kapasitas per kotak [cite: 24]
        $table->integer('quantity'); // Jumlah kotak [cite: 24]
        
        $table->decimal('base_price', 10, 2); // Harga modal [cite: 24]
        $table->decimal('subtotal', 10, 2); // Harga mentah [cite: 24]
        $table->decimal('discount', 10, 2); // Potongan harga [cite: 24]
        $table->decimal('shipping_fee', 10, 2); // Ongkir [cite: 24]
        $table->decimal('grand_total', 10, 2); // Total akhir [cite: 24]
        
        // Metode pengiriman (Takeaway/Delivery) [cite: 24]
        $table->enum('order_method', ['takeaway', 'delivery']); 
        
        // Boleh kosong (nullable) untuk data opsional [cite: 24]
        $table->string('pickup_code', 20)->nullable(); 
        $table->text('maps_location')->nullable(); 
        $table->text('gift_message')->nullable(); 
        
        // Status pembayaran [cite: 24]
        $table->enum('payment_status', ['pending', 'paid', 'failed']); 
        
        // Otomatis membuat kolom created_at dan updated_at [cite: 24]
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
