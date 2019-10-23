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
    protected $fillable = [
        'odleglosc', 'czas_dojazdu', 'pez', 'visitor', 'szp', 'paliwo',
    ];
}
