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
        Schema::create('plan_units', function (Blueprint $table) {
            $table->id();
            $table->string('unit')->nullable();
            $table->string('comp_esp')->nullable();
            $table->string('crit_desemp')->nullable();

            /* $table->foreignId('plan_id')->nullable()->constrained('plans')->onUpdate('cascade'); */

            $table->unsignedBigInteger('synoptic_id')->nullable();
            $table->foreign('synoptic_id')->references('id')->on('synoptics')->onUpdate('cascade');

            $table->unsignedBigInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade');

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
        Schema::dropIfExists('plan_units');
    }
};
