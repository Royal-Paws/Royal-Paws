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
            $table->string('nombre');
            $table->string('urlP');
            $table->string('imagen')->nullable();
            $table->mediumText('descripcion_breve')->nullable();
            $table->longText('descripcion');
        
            $table->integer('precio_original');
            $table->integer('precio_venta');
            $table->string('talla');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');

            $table->string('meta_titulo')->nullable();
            $table->string('palabras_clave')->nullable();
            $table->string('meta_descripcion')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
