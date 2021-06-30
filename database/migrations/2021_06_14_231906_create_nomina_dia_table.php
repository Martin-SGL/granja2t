<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominaDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomina_dia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomina_id');
            $table->unsignedBigInteger('dia_id');
            $table->unique('nomina_id','dia_id');
            $table->timestamps();

            $table->foreign('nomina_id')->references('id')->on('nominas')->onDelete('RESTRICT');
            $table->foreign('dia_id')->references('id')->on('dias')->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomina_dia');
    }
}
