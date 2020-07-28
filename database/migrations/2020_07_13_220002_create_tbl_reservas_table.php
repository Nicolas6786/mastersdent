<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')-> on ('tbl_clientes');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')-> on ('tbl_servicios');
            $table->date('fecha');
            $table->time('hora');
            $table->boolean('estado');
            $table->decimal('monto',8,2);
            $table->boolean('cambio');
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
        Schema::dropIfExists('tbl_reservas');
    }
}
