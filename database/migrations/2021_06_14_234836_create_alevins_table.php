<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlevinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alevins', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('precio_u', $precision = 8, $scale = 2);
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
        Schema::dropIfExists('alevins');
    }
}
