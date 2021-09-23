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
            $table->string('puesto',20);
            $table->decimal('salario_dia',$precision = 8, $scale = 2);
            $table->enum('estatus',[1,0])->default(1); #1 = activo, 0 = inactivo
            $table->softDeletes();
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
        Schema::dropIfExists('empleados');
    }
}
