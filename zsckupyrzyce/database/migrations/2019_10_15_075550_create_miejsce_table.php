<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiejsceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miejsce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_raport');
            $table->float('lat_from');
            $table->float('lon_from');
            $table->float('lat_to');
            $table->float('lon_to');
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
        Schema::dropIfExists('miejsce');
    }
}
