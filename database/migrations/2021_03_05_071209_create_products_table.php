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
            $table->bigIncrements('id', true);
            $table->bigInteger('catalogID')->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->string('desc');
            $table->string('image_link');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('catalogID')->references('id')->on('catagories');
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
