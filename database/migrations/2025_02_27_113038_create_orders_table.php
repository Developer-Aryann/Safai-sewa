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
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('store_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('carts')->onDelete('cascade');
            $table->string('note')->nullable();
            $table->integer('total')->default(0);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('coupons')->onDelete('set null');
            $table->integer('discount')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('grand_total');
            $table->integer('paid_amoount')->default(0);
            $table->integer('due_amount')->default(0);
            $table->enum('order_status', ['pending', 'processing', 'on_delivery', 'returned', 'cancelled', 'delivered']);
            $table->enum('payment_type', ['cash', 'online']);
            $table->enum('payment_status', ['pending', 'paid']);
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
