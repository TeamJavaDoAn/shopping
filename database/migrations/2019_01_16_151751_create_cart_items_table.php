<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cart_items', function($table) {
          $table->foreign('product_id')
              ->references('product_id')->on('product')
              ->onDelete('cascade');

          $table->foreign('cart_items')
              ->references('user_id')->on('users')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
