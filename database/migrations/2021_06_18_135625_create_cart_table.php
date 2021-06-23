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
            $table->unsignedbigInteger("id_products");
            $table->unsignedbigInteger("id_stocks");
            $table->unsignedbigInteger("id_customers");
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
