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
        Schema::create('synoptics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('purpose')->nullable();
            $table->string('priority')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('t')->nullable();
            $table->string('l_t')->nullable();
            $table->string('i_sc_p')->nullable();
            $table->string('s')->nullable();
            $table->string('a')->nullable();
            $table->string('hde')->nullable();

            $table->string('comp_esp')->nullable(); //Programa Sinoptico (P.S.) - Competencia Especifica
            $table->string('crit_desemp')->nullable(); //P.S. - Criterio de Desempeño
            $table->string('extruc_conten')->nullable(); //P.S. - Estructura de las Unidades de Aprendizaje / Contenido

            $table->integer('facul_decan')->default(0)->nullable(); //Facultad/Decanato
            $table->integer('carr_prog')->default(0)->nullable(); // Carrera-Programa/Programa

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
        Schema::dropIfExists('synoptics');
    }
};
