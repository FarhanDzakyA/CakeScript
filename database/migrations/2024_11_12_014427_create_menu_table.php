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
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('category')->onDelete('cascade');
            $table->string('menu_name', length: 255);
            $table->string('menu_description', length: 255);
            $table->integer('menu_price');
            $table->string('photo_url');
            $table->enum('availability', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
