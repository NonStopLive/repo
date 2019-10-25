<?php

namespace App\Http\Controllers;

use App\Raport;
use Illuminate\Http\Request;
use Goutte;

class AutoController extends Controller
{
    public $paliwa_ceny = array();
    public function index() { 
        return view("auto.index");
    }
    public function wynik(Request $request) {
        // dsfdsf

        $key = '5b3ce3597851110001cf6248b9d8a411b9b7449d9df6822f0f7ac292';
        
        $ch = curl_init();

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
            
        $rezultat = json_decode($result,true);
      // echo "<h1>".($rezultat['features'][0]['properties']['segments'][0]['distance']/1000)."</h1>";
 
        $raport=new Raport();
        $raport->odleglosc=($rezultat['features'][0]['properties']['segments'][0]['distance']/1000);

        if ((float)$rezultat['features'][0]['properties']['segments'][0]['duration']>(24*60*60)){ 
            $data=date("d H:i:s",strtotime("-1 day",($rezultat['features'][0]['properties']['segments'][0]['duration'])));
            $raport->czas_dojazdu=$data;
        }
        else{
        
        $raport->czas_dojazdu=(gmdate("H:i:s",($rezultat['features'][0]['properties']['segments'][0]['duration'])));
        }
        $raport->pez="0";
        $raport->visitor=$_SERVER['REMOTE_ADDR'];
        $raport->szp=$request->input('spalanie');
        $raport->paliwo=$request->input('paliwo');
        $raport->save();

            $sortedPrices = array();
        foreach($this->getCurrentPrices() as $key => $prices) {
            if(($key %4 )==0) { 
                $indeks = $prices;
            } else {
                $sortedPrices[$indeks][] = $prices;
            }

        }
        // zrodlo http://tarnogrod.oze.eurzad.eu/?page_id=79
        $emisja_c02 = array(
            "pb95" => "0.0295",
            "lpg" => "0.0225",
            "on" => "0.0316"
        );

        return view("auto.test")->with("czas2",($rezultat['features'][0]['properties']['segments'][0]['duration']))->with("odleglosc",$raport->odleglosc)->with('emisja_c02',$emisja_c02)->with('rodzaj_paliwa',$raport->paliwo)->with("cena_paliwa",$sortedPrices)->with('miasto_od',$request->input('from'))->with('miasto_do',$request->input('to'))->with('spalanie',$raport->szp)->with("czas",$raport->czas_dojazdu)->with('response',($result))->with('lat_from',$lat_from)->with('lon_from',$lon_from)->with('lat_to',$lat_to)->with('lon_to',$lon_to);
    }
    public function redirectKalkulator() {
        return redirect(route("kalkulator"));
    }
    public function wynik2() {
        
        $lon='8.681436';
        $lat='49.41461';
        return view("auto.test")->with('lat',$lat)->with('lon',$lon);
    }
    public function getCurrentPrices() {
     $crawler = Goutte::request('GET', 'http://paliwa.pl/monitoring-cen-paliw/wszystko-o-cenach');
              
        
          $crawler->filter('#Ceny > div.mod_CenyHurtowePaliw.ceny-panel > div.kontener-text > table  td')->each(function ($node) {
        $this->paliwa_ceny[] = $node->text();
        });
        return $this->paliwa_ceny;
}

}
