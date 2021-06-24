<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('stocks_id')->nullable();
            $table->foreign('stocks_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->unsignedBigInteger('recipes_id')->nullable();
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
           
            $table->integer("qty");
            $table->date("date");
            $table->timestamps();
            // $table->softDeletes();
        });

        // Schema::table('productions', function (Blueprint $table) {
        //     $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');

        // Schema::table('productions', function (Blueprint $table) {
        //     $table->dropForeign('productions_recipes_id_foreign');;
        // });
    }
}
