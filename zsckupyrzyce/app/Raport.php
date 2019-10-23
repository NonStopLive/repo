<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'raport';
    protected $fillable = [
        'odleglosc', 'czas_dojazdu', 'pez', 'visitor', 'szp', 'paliwo',
    ];
}
