<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMermasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mermas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->date('fecha');
            $table->unsignedBigInteger('estanque_id');
            $table->timestamps();

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
        Schema::dropIfExists('mermas');
    }
}
