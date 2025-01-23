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
        Schema::create('discount_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('discount_group_values', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_group_id');
            $table->unsignedBigInteger('percent');
            $table->decimal('amount', 9, 3);

            $table->foreign('discount_group_id')->references('id')->on('discount_groups')->onDelete('cascade');

            $table->primary(['discount_group_id', 'percent']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_group_values');
        Schema::dropIfExists('discount_groups');
    }
};
