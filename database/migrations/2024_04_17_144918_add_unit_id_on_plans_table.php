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
            $table->unsignedBigInteger('week_id')->nullable();
            $table->foreign('week_id')->references('id')->on('weeks')->onUpdate('cascade');

            /* $table->foreign('unit_id')->references('id')->on('units')
            ->onUpdate('cascade')->onDelete('set null'); */

            /* $table->foreignId('unit_id')->nullable()
            ->constrained('units')->onDelete('set null'); */
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
            $table->unsignedBigInteger('unit_id');
        });
    }
};
