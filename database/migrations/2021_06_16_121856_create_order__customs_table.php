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
            // $table->unsignedBigInteger('products_id')->nullable();
            // $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('confirm_payments_id')->nullable();
            $table->foreign('confirm_payments_id')->references('id')->on('confirm_payments')->onDelete('cascade');
            $table->date("date")->nullable();
            $table->string("status_pengerjaan")->nullable();
            $table->string("status_pembayaran")->nullable();
            $table->string("pict_payment")->nullable();
            $table->string("shipping")->nullable();
            $table->string("ongkir")->nullable();
            $table->text("keterangan")->nullable();
            $table->integer("total")->nullable();
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
