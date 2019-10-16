<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raport', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('odleglosc'); // odleglosc (float)
            $table->time('czasd_dojazdu'); // czas_dojazdu (time)
            $table->float('pez'); // poziom emisji zanieczyszczenia (float)
            $table->ipAddress('visitor'); // ip (varchar,255)
            $table->float('szp'); // srednie zuzycie paliwa (flaot)
            $table->integer('paliwo'); // rodzaj paliwa (INT)
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raport');
    }
}
