<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JubiladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado');
        });
        Schema::create('nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomina_tipo');
        });
        Schema::create('categoria_entes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
            $table->integer('id_user')->nullable();
            $table->timestamps();
        });
        Schema::create('entes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_ente');
            $table->integer('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categoria_entes');
            $table->integer('id_user')->nullable();
            $table->timestamps();
        });
        Schema::create('motivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_motivo');
            $table->integer('id_user')->nullable();
            $table->timestamps();
        });
        Schema::create('punto_cuenta', function(Blueprint $table){
            $table->increments('id');
            $table->string('nu_punto');
            $table->date('fecha_punto');
            $table->integer('nomina_id');
            $table->foreign('nomina_id')->references('id')->on('nominas');
            $table->integer('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::create('gaceta', function(Blueprint $table){
            $table->increments('id');
            $table->string('nu_gaceta');
            $table->date('fecha_gaceta');
            $table->integer('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::create('jubilados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');
            $table->string('genero');
            $table->integer('antiguedad');
            $table->integer('sueldo_promedio');
            $table->integer('nomina_id');
            $table->foreign('nomina_id')->references('id')->on('nominas');
            $table->integer('ente_id');
            $table->foreign('ente_id')->references('id')->on('entes');
            $table->integer('motivo_id');
            $table->foreign('motivo_id')->references('id')->on('motivos');
            $table->integer('monto');
            $table->integer('porcentaje');
            $table->integer('gaceta_id')->nullable();
            $table->foreign('gaceta_id')->references('id')->on('gaceta');
            $table->string('observacion')->nullable();
            $table->integer('nu_oficio');
            $table->date('fecha_oficio');
            $table->integer('nu_vp');
            $table->date('fecha_recibido');
            $table->integer('id_punto_cuenta')->nullable();
            $table->foreign('id_punto_cuenta')->references('id')->on('punto_cuenta');
            $table->integer('estatus_id');
            $table->foreign('estatus_id')->references('id')->on('estatus');
            $table->date('fecha_estatus')->nullable();
            $table->integer('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('año_registro')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jubilados');
        Schema::dropIfExists('punto_cuenta');
        Schema::dropIfExists('nominas');
        Schema::dropIfExists('entes');
        Schema::dropIfExists('categoria_entes');
        Schema::dropIfExists('motivos');
        Schema::dropIfExists('estatus');
    }
}
