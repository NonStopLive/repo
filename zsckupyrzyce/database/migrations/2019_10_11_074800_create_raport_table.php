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
            $table->float('odleglosc', 8, 2); // odleglosc (float)
            $table->time('czasd_dojazdu'); // czas_dojazdu (time)
            $table->float('pez', 8, 2); // poziom emisji zanieczyszczenia (float)
            $table->ipAddress('visitor'); // ip (varchar,255)
            $table->float('szp', 8, 2); // srednie zuzycie paliwa (flaot)
            $table->integer('paliwo'); // rodzaj paliwa (INT)
            
            //osobna tabela paliwo
            $table->bigIncrements('id'); // id | nazwa 

            // tabela miejsca
            // id | id_raport | lat | lon |  
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
        Schema::dropIfExists('raport');
    }
}
