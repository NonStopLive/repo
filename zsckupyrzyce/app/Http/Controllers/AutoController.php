<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index() { 
        return view("auto.index");
    }
    public function wynik(Request $request) {
        // dsfdsf

        $key = '5b3ce3597851110001cf6248b9d8a411b9b7449d9df6822f0f7ac292';
        
        $ch = curl_init();

        // Pobranie wspolrzednych na podstawie miejscowosci


            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_HEADER, false);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            // 'Content-Type: application/json; charset=utf-8',
            // 'Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8'
            // ));
            // //curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // $result = curl_exec($ch);
            //  return $result;



        //Wyznaczenie routy 

        $lat_from = $request->input('from_api_city_hidden_lat');
        $lon_from = $request->input('from_api_city_hidden_lon');
        $lat_to = $request->input('to_api_city_hidden_lat');
        $lon_to = $request->input('to_api_city_hidden_lon');

        $url = "https://api.openrouteservice.org/v2/directions/driving-car?api_key=".$key."&start=".$lat_from.",".$lon_from."&end=".$lat_to.",".$lon_to."";

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8'
            ));
            //curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($ch);
            // return $result;
            // curl_close($ch);

//         curl --include \
//      --header "Content-Type: application/json; charset=utf-8" \
//      --header "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8" \
//   'https://api.openrouteservice.org/v2/directions/driving-car?api_key=your-api-key&start=8.681495,49.41461&end=8.687872,49.420318'

       // return dd($request->all());

        // echo $request->input('odleglosc');
        // return "wynik";
    

        return view("auto.test")->with('response',($result))->with('lat_from',$lat_from)->with('lon_from',$lon_from)->with('lat_to',$lat_to)->with('lon_to',$lon_to);
    }
    public function wynik2() {
        
        $lon='8.681436';
        $lat='49.41461';
        return view("auto.test")->with('lat',$lat)->with('lon',$lon);
    }

}
