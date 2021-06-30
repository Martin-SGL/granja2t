<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_dias');
            $table->decimal('salario_dia', $precision = 8, $scale = 2);
            $table->decimal('total', $precision = 8, $scale = 2);
            $table->enum('recurso', [1,2]); // 1 = VQ || 2 = Granja
            $table->unsignedBigInteger('empleado_id');
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominas');
    }
}
