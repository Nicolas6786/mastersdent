<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_historials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')-> on ('tbl_doctors');
            $table->string('nombres_paciente',250);
            $table->string('apellidos_paciente',250);
            $table->date('fecha_nac');
            $table->string('observacion',500)->nullable();
            $table->string('antecedentes',500)->nullable();
            $table->string('alergias',500)->nullable();
            $table->string('ocupacion',250)->nullable();
            $table->boolean('embarazo');
            $table->string('diagnostico',500)->nullable();
            $table->string('examen_auxiliar',500)->nullable();
            $table->decimal('presupuesto',8,2);
            $table->decimal('adelanto',8,2);
            $table->date('fecha');
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
        Schema::dropIfExists('tbl_historials');
    }
}
