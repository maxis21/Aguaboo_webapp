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
            $table->unsignedBigInteger('customer_id'); 
            $table->foreign('customer_id')->references('customer_id')->on('customers'); 
            $table->string('order_purok');
            $table->string('order_barangay');
            $table->string('order_city');
            $table->string('order_pnumber');   
            $table->foreignId('truck_id')->constrained(); 
            $table->integer('total_quantity');
            $table->integer('returned')->default(0);    
            $table->decimal('total_price', 8, 2);
            $table->string('order_status')->default('pending');
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
