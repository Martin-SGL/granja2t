<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',20);
            $table->enum('lu',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('ma',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('mi',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('ju',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('vi',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('sa',[1,0])->default(0); #1 = Si, 0=No
            $table->enum('do',[1,0])->default(0); #1 = Si, 0=No
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
        Schema::dropIfExists('puestos');
    }
}
