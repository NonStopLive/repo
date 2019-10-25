<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .content {
                    height: 100vh;
                    background: #000;
                    color: #fff;
                    text-align: center;
                    display: table-cell;
                    width: 100%;
                    vertical-align: middle;
                }
        </style>
        @if(Route::currentRouteName() != '/')
        <link rel="stylesheet" href="{{asset('css/zscku.css')}}" />
        @endif

        @if(Route::currentRouteName() == 'kalkulator_wynik')
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-contextmenu/1.4.0/leaflet.contextmenu.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-contextmenu/1.4.0/leaflet.contextmenu.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
        <style>
            body {
                padding: 0;
                margin: 0;
            }
            html, body {
                height: 100%;
                width: 100%;
            }
            #map{
                height:50vh;
            }
        </style>
        @endif
    </head>
    <body>