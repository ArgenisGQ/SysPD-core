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
        Schema::table('courses', function (Blueprint $table) {
            /* $table->unsignedBigInteger('synoptic_id')->nullable();
            $table->foreign('synoptic_id')->references('id')->on('synoptics'); */

            $table->foreignId('synoptic_id')->nullable()->constrained('synoptics')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('synoptic_id');
        });
    }
};
