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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('unit')->nullable();
            $table->string('comp_esp')->nullable();
            $table->string('crit_desemp')->nullable();
            $table->string('name_est_eva')->nullable();
            $table->string('est_eva')->nullable();
            $table->string('inst_eva')->nullable();
            $table->string('tip_eva')->nullable();
            $table->string('evid_eva')->nullable();
            $table->string('retro')->nullable();

            $table->string('lapso')->nullable();//que grabar aqui?

            $table->string('ponderacion')->nullable();

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
        Schema::dropIfExists('plans');
    }
};
