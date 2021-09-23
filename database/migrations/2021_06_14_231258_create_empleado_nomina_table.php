<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoNominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_nomina', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('nomina_id');
            $table->enum('recurso',[1,2])->default(1); #1 = Granja 2T, 2 = VQ
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('RESTRICT');
            $table->foreign('nomina_id')->references('id')->on('nominas')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_nomina');
    }
}
