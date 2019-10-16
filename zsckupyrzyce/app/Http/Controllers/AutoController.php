<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index() { 
        return view("auto.index");
    }
    public function wynik($request) {
        // dsfdsf
        echo $request->input('odleglosc');
        return "wynik";
    }
}
