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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('confirm_payments_id');
            $table->foreign('confirm_payments_id')->references('id')->on('confirm_payments')->onDelete('cascade');
            // $table->unsignedBigInteger('discounts_id');
            // $table->foreign('discounts_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->date("date");
            $table->integer("total");
            $table->string("pict_payment")->nullable();
            $table->string("status")->nullable();
            $table->string("keterangan")->nullable();
            $table->string("shipping");
            $table->integer("ongkir");
            // $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
