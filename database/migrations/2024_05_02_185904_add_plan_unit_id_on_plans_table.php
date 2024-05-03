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
        Schema::table('plans', function (Blueprint $table) {
            /* $table->foreignId('plan_unit_id')->nullable()->constrained('plan_units')->onUpdate('cascade'); */

            $table->unsignedBigInteger('plan_unit_id')->nullable();
            $table->foreign('plan_unit_id')->references('id')->on('plan_units')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            Schema::table('plans', function (Blueprint $table) {
                $table->unsignedBigInteger('plan_unit_id');
            });
        });
    }
};
