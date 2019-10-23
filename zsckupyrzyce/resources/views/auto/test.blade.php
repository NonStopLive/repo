<html>
    <head>
        <title>A fullscreen ORS webmap</title>
        <meta charset="utf-8" />
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
            html, body, #map {
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="dane">
            {!! $response !!}
        </div>
        <div id="map"></div>
        <script>
             var map = L.map('map',{
                contextmenu: true,
                contextmenuWidth: 140,
                contextmenuItems: [
                    {
                        text: 'get Isochrones',
                        callback: getAccess
                    }
                ]
            }).setView([{{$lon_from}},{{$lat_from}}], 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 24
            }).addTo(map);
            //the geojson data:
            var data = {!!$response!!}
            function onEachMarker(feature, layer){
                layer.bindContextMenu({
                    contextmenu: true,
                    contextmenuWidth: 140,
                    contextmenuItems: [
                        {
                            text: 'get Isochrones from marker',
                            callback: getAccessFromMarker
                        }
                    ]
                })
                layer.bindPopup(feature.properties.name);  
            };
            var markers = L.geoJSON(data, {
                onEachFeature: onEachMarker
            }).addTo(map);
            function getAccessFromMarker(e){
                getIsochrones(e.relatedTarget.feature.geometry.coordinates);
            }
            function getAccess(e){
                getIsochrones([e.latlng.lng,e.latlng.lat]);
            }
            function getIsochrones(point){
                $.ajax({
                    type: "GET", //rest Type
                    dataType: 'json',
                    url: "https://api.openrouteservice.org/isochrones?locations=" + String(point[0]) + "," + String(point[1]) +"&profile=driving-car&range_type=time&interval=300&range=1800&units=&location_type=start&intersections=false&api_key=58d904a497c67e00015b45fc90fa91f0d345426145bb09e67e859771",
                    async: false,
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        map.eachLayer(function (layer) {
                            if (layer.id === 'access'){// it's the access layer
                                map.removeLayer(layer);
                            } 
                        });
                        var difference=[];
                        for (i=0; i<(data.features.length-1); i++){
                            console.log(i);
                            difference.push(turf.difference(data.features[i+1],data.features[i]));
                        }
                        difference.push(data.features[0]);
                        data.features=difference;
                        access = new L.geoJson(data,{
                            onEachFeature: function(feature,layer){
                                layer.bindPopup("Isochrone: " + feature.properties.value);
                            },
                            style: function(feature) {
                                ratio=feature.properties.value/1800;
                                return {color :"rgb(0, 0, 0)",
                                opacity: 1};
                            }
                        }).addTo(map);
                        access.id="access";
                    }
                });
            }

            </script>
    </body>
</html>