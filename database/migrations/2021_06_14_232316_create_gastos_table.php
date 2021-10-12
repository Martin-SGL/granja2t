<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('total', $precision = 16, $scale = 2);
            $table->enum('recurso', [1,2]); //1= Granja 2T || 2=VQ
            $table->unsignedBigInteger('gastoable_id');
            $table->string('gastoable_type');
            $table->timestamps();

            $table->unique(['gastoable_id','gastoable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
