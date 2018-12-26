<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->string('sku');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('shortDescription')->nullable();
            $table->text('description')->nullable();
            $table->float('retailPrice')->nullable();
            $table->float('wholeSalePrice')->nullable();
            $table->string('picture_one')->nullable();
            $table->string('picture_two')->nullable();
            $table->string('picture_three')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('reference_product_id')->nullable();
        });

        /**
         * Create products
         */




















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
