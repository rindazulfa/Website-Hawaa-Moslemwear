<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('stocks_id');
            $table->foreign('stocks_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->unsignedBigInteger('materials_id');
            $table->foreign('materials_id')->references('id')->on('materials')->onDelete('cascade');
            $table->integer("qty");
            $table->string("satuan");
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
        Schema::dropIfExists('recipes');
    }
}
