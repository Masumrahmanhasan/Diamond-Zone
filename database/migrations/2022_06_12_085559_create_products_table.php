<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->tinyText('short_description')->nullable();
            $table->longText('description');
            $table->string('thumbnail');
            $table->string('gallary');
            $table->string('certificate')->nullable();
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
