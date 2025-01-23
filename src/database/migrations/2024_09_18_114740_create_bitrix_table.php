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
        Schema::table('users', function (Blueprint $table) {
            $table->string('bitrix')->index()->nullable();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('bitrix')->index()->nullable();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('bitrix')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->dropColumn('bitrix');
        });

        Schema::table('news', function($table) {
            $table->dropColumn('bitrix');
        });

        Schema::table('articles', function($table) {
            $table->dropColumn('bitrix');
        });
    }
};
