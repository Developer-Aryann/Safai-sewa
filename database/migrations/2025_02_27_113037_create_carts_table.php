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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('customer');
            $table->unsignedBigInteger('services');
            $table->foreign('store_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('services')->references('id')->on('cart_services')->onDelete('cascade');
            $table->text('addons')->nullable();
            $table->integer('addons_total')->nullable();
            $table->integer('total');
            $table->date('order_date');
            $table->date('delivery_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
