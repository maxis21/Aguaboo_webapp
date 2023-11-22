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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name');
            $table->string('customer_purok');
            $table->string('customer_barangay');
            $table->string('customer_city');
            $table->integer('borrowed')->default(0);
            $table->string('customer_phonenum');
            $table->string('customer_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
