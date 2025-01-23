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
        Schema::create('email_constructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->string('subject');
            $table->string('tags');
            $table->text('text')->nullable();
            $table->longText('html')->nullable();
            $table->longText('json')->nullable();
            
            $table->string('attachments')->nullable();

            $table->timestamps();
        });

        Schema::create('email_constructor_sends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_constructor_id');
            $table->string('email')->index();
            $table->integer('read')->default(0);
            $table->integer('unsubscribe')->default(0);
            
            $table->integer('count')->default(1);
          
            $table->foreign('email_constructor_id')->references('id')->on('email_constructors')->onDelete('cascade');
            
            $table->timestamps();
        });
 
        Schema::create('email_constructor_send_tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_constructor_send_id');
            $table->integer('key')->index();
            $table->integer('count')->default(1);

            $table->foreign('email_constructor_send_id')->references('id')->on('email_constructor_sends')->onDelete('cascade');
            
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_constructor_tracks');
        Schema::dropIfExists('email_constructor_sends');
        Schema::dropIfExists('email_constructors');
    }
};
