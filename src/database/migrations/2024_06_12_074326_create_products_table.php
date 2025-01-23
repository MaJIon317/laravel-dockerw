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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('discount_group_id')->nullable();
            $table->string('article');
            $table->string('barcode');
            $table->text('images')->nullable();
            $table->decimal('price', 15, 4);
            $table->decimal('discount', 15, 4);
            $table->integer('minimum')->default(1);
            $table->integer('stock')->default(0);
         
            $table->string('title');
            $table->text('description')->nullable();
      
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('video')->nullable();
            $table->text('marketplace')->nullable();

            $table->string('slug')->index()->nullable();
            $table->integer('hit')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->string('exchange_1c', 40)->nullable()->index();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('discount_group_id')->references('id')->on('discount_groups')->nullOnDelete();
        });


        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('exchange_1c', 40)->index();
        });

        Schema::create('property_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('name');
            $table->string('exchange_1c', 40)->index();
             
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });


        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('exchange_1c', 40)->index();
        });

        Schema::create('attribute_products', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('product_id');
            $table->string('value');

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_values');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('attribute_products');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('products');
    }
};
