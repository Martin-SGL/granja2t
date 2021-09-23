<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->float('kilos',8,2);
            $table->integer('piezas');
            $table->date('fecha');
            $table->decimal('precio',$precision = 8, $scale = 2);
            $table->decimal('total',$precision = 8, $scale = 2);
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('estanque_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('RESTRICT');
            $table->foreign('estanque_id')->references('id')->on('estanques')->onDelete('RESTRICT');
           

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
