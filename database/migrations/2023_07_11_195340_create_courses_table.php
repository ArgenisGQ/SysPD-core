<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code');
            $table->string('section')->nullable();
            $table->Integer('unit01')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit02')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit03')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit04')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit05')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit06')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit07')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit08')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit09')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit10')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit11')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit12')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit13')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit14')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit15')->default(0)->nullable(); //ponderacion total de la unidad
            $table->Integer('unit16')->default(0)->nullable(); //ponderacion total de la unidad
            $table->integer('unitTotal')->default(4)->nullable(); //total de unidades activas a usar
            $table->integer('totalUnidad')->default(0)->nullable(); //total de ponderacion de las unidades activas a usar
            //$table->string('slug')->nullable();
            //$table->string('color')->nullable();
            //$table->string('turma')->unique()->nullable();
            $table->string('id_dpto')->unique()->nullable();
            $table->string('id_faculty')->unique()->nullable();

            /* $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods'); */

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
        Schema::dropIfExists('courses');
    }
};
