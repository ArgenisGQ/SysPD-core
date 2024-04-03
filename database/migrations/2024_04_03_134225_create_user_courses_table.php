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
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            /* $table->string('code')->unique()->nullable(); */

            $table->string('section')->nullable();
            $table->string('course')->nullable();

            /* $table->unsignedBigInteger('ced')->nullable(); */
            $table->unsignedBigInteger('idcard')->nullable();
            /* $table->foreign('ced')->references('ced')->on('users'); */

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            /* $table->unsignedBigInteger('ced_user')->nullable();
            $table->foreign('ced_user')->references('ced')->on('users'); */

            $table->string('name')->nullable();


            /* $table->foreign('id_user')->references('id')->on('users'); */

            /* $table->unsignedBigInteger('id_course')->nullable();
            $table->foreign('id_course')->references('id')->on('courses'); */

            //Seccion a usas cuando el sistema de periodos activos
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
        Schema::dropIfExists('user_courses');
    }
};
