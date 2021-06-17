<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customs', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('customers_id')->nullable();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('confirm_payments_id');
            $table->foreign('confirm_payments_id')->references('id')->on('confirm_payments')->onDelete('cascade');
            $table->date("date");
            $table->string("status_pengerjaan");
            $table->string("status_pembayaran");
            $table->string("shipping");
            $table->string("ongkir");
            $table->string("keterangan");
            $table->integer("total");
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
        Schema::dropIfExists('order_customs');
    }
}