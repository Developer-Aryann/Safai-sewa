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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('code');
            $table->integer('discount');
            $table->integer('min_order');
            $table->integer('max_use')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('coupon_type')->default(1)->comment('1: Flat, 2: Percentage');
            $table->integer('user_usage_limit')->default(0)->comment('0: Unlimited');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
