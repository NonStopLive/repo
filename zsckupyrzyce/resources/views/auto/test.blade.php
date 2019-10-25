@include('head')
    <section class="formularz">
    @include('auto.index')
    </section>
    <h1 style="text-align: center;background: #b76d11;color: #fff;margin: 0;padding: 20px 0;font-size: 2rem;font-weight: 300;">Podsumowanie</h1>
        <section class="dane">
        <div class="container">
            <h1 style="text-align: center;color: #fff;margin: 0 0 50px 0;display: block;">Droga z {{$miasto_od}} <img src="https://image.flaticon.com/icons/svg/2164/2164561.svg" width="48" style="filter: invert(1);transform: rotate(90deg);" /> {{$miasto_do}}</h1>
            <div class="row">
            
            <div class="col-md-3">
            <div class="card">
  <div class="card-body">
    <h4>Odległosc</h4>
    <img src="https://image.flaticon.com/icons/svg/453/453552.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    {{number_format($odleglosc,2)}} [km]
  </div>
</div>
            </div>
                        <div class="col-md-3">
            <div class="card">
  <div class="card-body">
    <h4>Czas</h4>
    <img src="https://image.flaticon.com/icons/svg/149/149235.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    {{$czas}}
  </div>
</div>
            </div>
                        <div class="col-md-3">
            <div class="card">
  <div class="card-body">
    <h4>Sr. zuzycie paliwa</h4>
    <img src="https://image.flaticon.com/icons/svg/865/865998.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    
    {{number_format($spalanie,2)}} [litrów]
  </div>
</div>
            </div>
                        <div class="col-md-3">
            <div class="card">
  <div class="card-body">
    <h4>Cena paliwa</h4>
    
    <img src="https://image.flaticon.com/icons/svg/584/584067.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />

{{number_format(floatval(str_replace(',', '.', str_replace('.', '', $cena_paliwa[$rodzaj_paliwa][1]))) * ($spalanie*($odleglosc/100)),2)}} [PLN]  
</div>
</div>
            </div>
 

            </div>
            </div>
        </section>
        <div class="col-md-12" style="
    /* margin: 50px auto 0 auto; */
    background: #0e1216;
    padding: 50px 0;
">
                <div class="card" style="
    border: 0;
">
  <div class="row">
    <div class="col-md-4">
        
        <img src="https://image.flaticon.com/icons/svg/18/18229.svg" style="filter: invert(1);width: 120px;display: block;margin: 32px auto;">
    </div>
    <div class="col-md-8" style="
    text-align: left;
">
        
    <h4 style="
">Poziom emisji C02</h4>
    
    

    <h1 style="
    display: inline;
    font-size: 90px;
">{{number_format(($spalanie)*$emisja_c02[$rodzaj_paliwa]*$odleglosc,2)}} [CO<sub>2</sub> kg]</h1>
    </div>
</div>
</div>
      
            </div>
        <section class="map">
            <h1 style="text-align: center;background: #3487fb;color: #fff;margin: 0;padding: 20px 0;font-size: 2rem;font-weight: 300;">Trasa</h1>
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
            </section>
                            <h1 style="text-align: center;background: #309c56;color: #fff;margin: 0;padding: 20px 0;font-size: 2rem;font-weight: 300;">Wnioski</h1>
            <section class="wnioski">
            <div class="container">
                <div class="row">
                
                    <div class="col-md-4">
                                  <div class="card">
  <div class="card-body">
    <h4>Roczny koszt paliwa</h4>
<img src="https://image.flaticon.com/icons/svg/1623/1623344.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    
{{number_format(floatval(str_replace(',', '.', str_replace('.', '', $cena_paliwa[$rodzaj_paliwa][1]))) * ($spalanie*($odleglosc/100)) * 365,2)}} [PLN]  
  </div>
</div>
                    </div>
                    <div class="col-md-4">
                              <div class="card">
  <div class="card-body">
    <h4>Roczne zanieczyszczenia</h4>
    <img src="https://image.flaticon.com/icons/svg/80/80379.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    {{number_format(($spalanie)*$emisja_c02[$rodzaj_paliwa]*$odleglosc*356,2)}} [CO<sub>2</sub> kg]
  </div>
</div>
</div>
<div class="col-md-4">
          <div class="card">
  <div class="card-body">
    <h4>Roczne zuzycie paliwa</h4>
    
    <img src="https://image.flaticon.com/icons/svg/1505/1505581.svg" style="    filter: invert(1);width: 48px;display: block;margin: 32px auto;" />
    
    {{$spalanie*365}} [litrów]
    {{$czas2}}
  </div>
</div>
</div>
</div>
                </div>
            </section>
    </body>
</html>