<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 /**
  * 1# pawel i python wezma zainstaluja frameworka laravel + composer
  * 2# pull z repo projekt
  * 3# wpiszcie komende php artisan serve
  * 4# wejdzcie na adres http://127.0.0.1:8000 
  * 5# przygotujcie wzor pod wylicznie poziomu zanieczyszczenia z aut tj dane wejsciowe ktore powinien podac uzytkownik
  */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/kalkulator', "AutoController@index")->name("kalkulator");

Route::post('/kalkulator/wynik', "AutoController@wynik")->name("kalkulator_wynik");

Route::get('/kalkulator/test','AutoController@wynik2')->name("testWynik");