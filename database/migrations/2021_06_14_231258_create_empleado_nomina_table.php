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
            $table->integer('cantidad_dias');
            $table->decimal('salario_dia', $precision = 8, $scale = 2);
            $table->decimal('total', $precision = 8, $scale = 2);
            $table->enum('lun',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('mar',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('mie',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('jue',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('vie',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('sab',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('dom',[1,0]); #1 = trabajo , 0 = no trabajo
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
