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
            $table->enum('lun',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('mar',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('mie',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('jue',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('vie',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('sab',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->enum('dom',[1,0]); #1 = trabajo , 0 = no trabajo
            $table->date('ini_sem');
            $table->date('fin_sem');
            $table->timestamps();

           
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
