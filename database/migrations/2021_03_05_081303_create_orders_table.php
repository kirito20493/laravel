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
            $table->bigInteger('transactionID')->unsigned();
            $table->bigInteger('productID')->unsigned();
            $table->bigInteger('userID')->unsigned();
            $table->integer('qty');
            $table->integer('amount');
            $table->timestamps();
        });
        Schema::table('orders', function($table) {
            $table->foreign('transactionID')->references('id')->on('transactions');
            $table->foreign('productID')->references('id')->on('products');
            $table->foreign('userID')->references('id')->on('users');
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
