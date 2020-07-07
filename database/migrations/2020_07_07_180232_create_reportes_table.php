<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_datos_personales');
            $table->foreign('id_datos_personales')->references('id')->on('datos_personales');
            $table->unsignedBigInteger('id_objeto_extraviado');
            $table->foreign('id_objeto_extraviado')->references('id')->on('objetos_extraviados');
            $table->date('fecha');
            $table->unsignedBigInteger('id_direccion');
            $table->foreign('id_direccion')->references('id')->on('direcciones');
            $table->text('descripcion');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('reporte_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
