<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('materials_id')->unsigned()->nullable();
            // $table->unsignedBigInteger('materials_id')->nullable();
            // $table->foreign('materials_id')->references('id')->on('materials')->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            // $table->softDeletes();
            $table->timestamps();
        });

        // Schema::table('suppliers', function (Blueprint $table) {
        //     $table->foreign('materials_id')->references('id')->on('materials')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
        // $table->dropForeign('suppliers_materials_id_foreign');
        // $table->dropIndex('suppliers_materials_id_index');
        // $table->dropColumn('materials_id');

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign('suppliers_materials_id_foreign');
            // $table->dropIndex('suppliers_materials_id_index');
            // $table->dropColumn('materials_id');
        });
    }
}
