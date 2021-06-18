<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('orders_id');
            $table->string("payment_purpose");
            $table->dateTime("transfer_date");
            $table->integer("Transfer_Amount");
            $table->string("proof_of_payment");
            $table->string("description")->nullable();
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
        Schema::dropIfExists('confirm_payments');
    }
}
