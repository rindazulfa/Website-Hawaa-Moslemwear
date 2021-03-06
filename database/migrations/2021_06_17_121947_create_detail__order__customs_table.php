<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrderCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order_customs', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('order_customs_id');
            $table->foreign('order_customs_id')->references('id')->on('order_customs')->onDelete('cascade');
            $table->string("size")->nullable();
            $table->integer("qty")->nullable();
            $table->integer("harga")->nullable();
            $table->string("warna")->nullable();
            $table->string("keterangan_order")->nullable();
            $table->integer("subtotal")->nullable();
            $table->date("date")->nullable();
            $table->string("pict_desain");
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
        Schema::dropIfExists('detail_order_customs');
    }
}
