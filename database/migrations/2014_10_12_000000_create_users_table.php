<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opcion');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->integer('rol')->unsigned();
            $table->foreign('rol')->references('id')->on('roles');
            $table->timestamps();
        });

        /*Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opcion');
            $table->string('conversion');
        });*/
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
