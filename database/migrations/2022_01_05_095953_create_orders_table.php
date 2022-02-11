<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->string('code', 255)->unique();
            $table->string('fullname', 255);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->string('comment', 255)->nullable();
            $table->tinyInteger('shipping_method')->default(1);
            $table->integer('shipping_fee');
            $table->tinyInteger('status')->default(0);
            $table->date('order_date');
            $table->timestamps();
            $table->softDeletes();

            // Set Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->index('orders_user_id_fk');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->index('orders_payment_method_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
