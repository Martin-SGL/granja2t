<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',100);
            $table->unsignedBigInteger('gasto_id');
            $table->timestamps();

            $table->foreign('gasto_id')->references('id')->on('gastos')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varios');
    }
}
