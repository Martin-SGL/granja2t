<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaEstanqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_estanque', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('estanque_id');
            $table->unique('venta_id','estanque_id');
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('RESTRICT');
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
        Schema::dropIfExists('venta_estanque');
    }
}
