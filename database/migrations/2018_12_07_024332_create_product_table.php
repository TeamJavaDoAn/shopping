<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('cat_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->integer('quantity');
            $table->string('image');
            $table->string('thumbnail');
            $table->timestamps();
        });

        Schema::table('product', function ($table) {
            $table->foreign('cat_id')->references('cat_id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
