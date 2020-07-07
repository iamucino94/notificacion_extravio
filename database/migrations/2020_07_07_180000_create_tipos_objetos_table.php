<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposObjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_objetos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 30);
        });

        DB::table('tipos_objetos')->insert(
            [
                ['nombre' => 'Documento'],
                ['nombre' => 'Objeto']
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
        Schema::dropIfExists('tipos_objetos');
    }
}
