<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energias', function (Blueprint $table) {
            $table->id();
            $table->decimal('blower',$precision = 8, $scale = 2);
            $table->decimal('poso',$precision = 8, $scale = 2);
            $table->decimal('domestica',$precision = 8, $scale = 2);
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
        Schema::dropIfExists('energias');
    }
}
