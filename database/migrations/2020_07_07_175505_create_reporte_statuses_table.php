<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 30);
        });

        DB::table('reporte_statuses')->insert(
            [
                ['nombre' => 'Recibido'],
                ['nombre' => 'Respondido'],
                ['nombre' => 'Por corregir']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_statuses');
    }
}
