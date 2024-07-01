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
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->string('unit')->nullable();
            $table->string('semana')->nullable();
            $table->string('contenido')->nullable();
            $table->string('comp_esp')->nullable();
            $table->string('crit_desemp')->nullable();
            $table->string('est_didac')->nullable();
            $table->string('eval')->nullable();
            $table->string('rec_apren')->nullable();
            $table->string('biblio')->nullable();

            $table->unsignedBigInteger('synoptic_id')->nullable();
            $table->foreign('synoptic_id')->references('id')->on('synoptics');

           /*  $table->unsignedBigInteger('plans_id')->nullable();
            $table->foreign('plans_id')->references('id')->on('plans'); */

            /* $table->unsignedBigInteger('plans_id')->nullable();
            $table->foreign('plans_id')->references('id')->on('plans')->onUpdate('cascade'); */

            $table->unsignedBigInteger('planning_id')->nullable();
            $table->foreign('planning_id')->references('id')->on('plannings');


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
        Schema::dropIfExists('weeks');
    }
};
