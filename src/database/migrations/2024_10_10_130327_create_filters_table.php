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
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('slug')->index();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('status')->default(1);
        });

        Schema::create('filter_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_id');
            $table->string('locale', 11);
            $table->string('name');
            $table->longText('description');

            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');

            $table->primary(['filter_id', 'locale']);
        });

        Schema::create('filter_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filter_id');
            $table->string('slug')->index();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('status')->default(1);

            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
        });

        Schema::create('filter_value_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_value_id');
            $table->string('locale', 11);
            $table->string('name');
            $table->longText('description');

            $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');

            $table->primary(['filter_value_id', 'locale']);
        });
    
        Schema::create('filter_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->primary(['filter_id', 'category_id']);
        });

        Schema::create('filter_value_products', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_value_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('filter_value_id')->references('id')->on('filter_values')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->primary(['filter_value_id', 'product_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_translations');
        Schema::dropIfExists('filter_value_translations');
        Schema::dropIfExists('filter_categories');
        Schema::dropIfExists('filter_value_products');
        Schema::dropIfExists('filter_values');
        Schema::dropIfExists('filters');
    }
};
