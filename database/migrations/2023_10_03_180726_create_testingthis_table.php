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
        Schema::create('testingthis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); 
            $table->foreign('customer_id')->references('customer_id')->on('customers'); 
            $table->string('order_detail');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testingthis');
    }
};
