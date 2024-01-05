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
            $table->string('image');  
            $table->unsignedBigInteger('user_id'); // Chú ý sử dụng unsignedBigInteger để tương ứng với trường 'id' của bảng 'users'
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->integer('product_price');
            $table->string('status');
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
