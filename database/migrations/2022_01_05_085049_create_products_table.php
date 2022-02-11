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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->string('code', 255)->unique()->nullable();
            $table->string('name', 255)->unique();
            $table->string('thumbnail', 255);
            $table->string('description', 512);
            $table->longText('content')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->integer('quantity');
            $table->double('price', 8, 2);
            $table->string('image', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Set Foreign Key
            $table->foreign('category_id')->references('id')->on('categories')->index('products_category_id_fk');
            $table->foreign('promotion_id')->references('id')->on('promotions')->index('products_promotion_fk');
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
