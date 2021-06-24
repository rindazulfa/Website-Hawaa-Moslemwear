<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puchases', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('materials_id');
            $table->foreign('materials_id')->references('id')->on('materials')->onDelete('cascade');
            $table->unsignedBigInteger('suppliers_id');
            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->date("date");
            $table->integer("harga");
            $table->double("qty");
            $table->string("satuan");
            $table->integer("total");
            $table->text("keterangan");
            $table->timestamps();
            // $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puchases');
    }
}
