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
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('session_id')->index()->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity')->default(1);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('new')->index();
            $table->string('payment')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('delivery')->nullable();
            $table->decimal('total', 15, 4);

            $table->string('inn')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('comment')->nullable();

            $table->text('notes')->nullable();
            
            $table->string('exchange_1c', 40)->nullable()->index();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
    
            $table->integer('quantity');
            $table->decimal('price', 15, 4);
            $table->decimal('total', 15, 4);
            $table->tinyInteger('absent')->nullable();
       
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('order_totals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('code');
            $table->decimal('value', 15, 4);
    
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('status')->default('new');
            $table->text('comment')->nullable();
            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index();
            $table->boolean('percent')->default(true);
            $table->decimal('discount', 15, 4);
            $table->timestamp('publish_start')->nullable();
            $table->timestamp('publish_end')->nullable();
            $table->tinyInteger('count_uses')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('coupon_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('order_id');
            $table->decimal('value', 15, 4);
    
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('order_totals');
        Schema::dropIfExists('order_histories');
        Schema::dropIfExists('coupon_histories');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('coupons');
    }
};
