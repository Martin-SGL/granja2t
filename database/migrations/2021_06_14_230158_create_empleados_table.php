<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->bigInteger('telefono');
            $table->string('calle',45);
            $table->integer('numero');
            $table->string('municipio_estado',45);
            $table->unsignedBigInteger('puesto_id');
            $table->decimal('salario_dia',$precision = 8, $scale = 2);
            $table->enum('estatus',[2,1,0])->default(2); #2=acitvo, 1 = descanzado, 0 = despedido
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('puesto_id')->references('id')->on('puestos')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
