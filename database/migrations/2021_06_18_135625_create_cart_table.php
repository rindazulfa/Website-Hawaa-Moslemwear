<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('stocks_id');
            $table->foreign('stocks_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->unsignedBigInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string("size");
            $table->integer("price");
            $table->integer("qty");
            $table->integer("subtotal");
            $table->date("date");
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
        Schema::dropIfExists('cart');
    }
}
