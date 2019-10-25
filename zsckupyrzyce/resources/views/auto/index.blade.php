
 @if(Route::currentRouteName() == 'kalkulator')
@include('head')
 @endif 
<style>
p{
    margin: 0;
}
.form-control {
margin: 10px 0;
}
</style>
@if(Route::currentRouteName() != '/')
        <h1 class="heading" style="background:#980505;">Oblicz poziom zanieczyszeń auta</h1>
        @endif

<div class="panel">
    <script type="text/javascript"> 
 
        var wynik;
            function oblicz() {
                /*why are we still here? Just to suffer?*/
              var x = document.querySelector('#x').value;
              var y = document.querySelector('#i').value;
              var paliwo = document.querySelector('#paliwo').value;
              var ssp = document.querySelector('#ssp').value;
            if (x <= 0 || y <= 0){
                document.querySelector(".wynik").innerHTML = "Podaj prawidłową odległość, ilość, lub wybierz rodzaj biletu!"}
            else if (x == true ) {
            document.querySelector(".wynik").innerHTML = x;
            }
            else if (y == true ) {
            document.querySelector(".wynik").innerHTML = x;
            }
            }
            var count=1
            function dodajPozycje(){
                count++;
                var p = document.createElement("div");
                p.classList = "input-group mb-3";
                p.setAttribute('data-id', count);
                var zawartosc_pozycji ='';
                zawartosc_pozycji += '<p><input type="text" class="form-control" placeholder="Od:" id="y" name="from" data-id="'+count+'"/><input type="text" class="form-control" placeholder="Paliwo:" id="paliwo" name="fuel" data-id="'+count+'" /></p><p><input type="text" class="form-control" placeholder="Do:" id="x" name="destination" data-id="'+count+'" /><input type="text" class="form-control" placeholder="Średnie spalanie:" id="ssp" name="fuel usage" data-id="'+count+'" /></p><button type="button" id="del" name="del" onclick="usunPozycje('+count+')" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">-</button>';
                p.innerHTML = zawartosc_pozycji;
                document.querySelector("#putin").appendChild(p);
            }
            function usunPozycje(){
                console.log(count);
                

            }
            </script>
            <form method="post" action="{{route('kalkulator_wynik')}}">
               @csrf
            <div id="putin"> <!-- .setAttribute('data-id',x); -->
            <div class="container">
            <div class="row" style="    margin: 100px 0 0 0;background: #fff;padding: 50px 50px 25px 50px;">
                <div class="col-md-6">
                <input type="text" required class="form-control from_api_city" placeholder="Od: Szczecin" id="y" name="from" data-id="1" />
                <select class="form-control" id="paliwo" name="paliwo" data-id="1">
                    <option value="pb95">Benzyna</option>
                    <option value="on">Deasel</option>
                    <option value="lpg">LPG</option>
                </select>
                <!-- <input type="text"  required class="form-control" placeholder="Paliwo:"  id="paliwo" name="paliwo" data-id="1" /> -->
                </div>
                <div class="col-md-6">
                <input type="text"  required class="form-control to_api_city" placeholder="Do: Warszawa" id="x" name="to" data-id="1" />
                <input type="text"  required class="form-control" placeholder="Średnie spalanie:" id="ssp" name="spalanie" data-id="1" />
                </div>
                <div class="col-md-12">
                <input type="hidden" class="form-control from_api_city_hidden_lon"  id="from_api_city_hidden_lon" name="from_api_city_hidden_lon" data-id="1" /></p>
                <input type="hidden" class="form-control from_api_city_hidden_lat"  id="from_api_city_hidden_lat" name="from_api_city_hidden_lat" data-id="1" /></p>
                <input type="hidden" class="form-control to_api_city_hidden_lon" id="to_api_city_hidden_lon" name="to_api_city_hidden_lon" data-id="1" /></p>
                <input type="hidden" class="form-control to_api_city_hidden_lat" id="to_api_city_hidden_lat" name="to_api_city_hidden_lat" data-id="1" /></p>
                </div>
                <button type="submit" id="oblicz" class="btn btn-primary" style="margin: 20px auto;padding: 10px 75px;" onclick="oblicz()"><i class="fa fa-calculator" aria-hidden="true"></i>
Przelicz</button>
                </div>
                
                
            </div>
      
 
            </div>
             
            
        </form>

            <div class="wynik">
                
</div>
</div>
</div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

var request = new XMLHttpRequest();

$(document).ready(function() {
    console.log("fdsf");
})
$(".to_api_city, .from_api_city").keyup(function(){
    console.log($(this).val());

    
request.open('GET', 'https://api.openrouteservice.org/geocode/search/structured?api_key=5b3ce3597851110001cf6248b9d8a411b9b7449d9df6822f0f7ac292&locality='+$(this).val());

request.setRequestHeader('Accept', 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8');

console.log($(this).attr('class'));
    var obiekt = $(this);
request.onreadystatechange = function () {
  if (this.readyState === 4) {
      var data = JSON.parse(this.responseText);
    //console.log('Status:', this.status);
    //console.log('Headers:', this.getAllResponseHeaders());
    //console.log('Body:', this.responseText);
    console.log('Body:', data.features[0].geometry.coordinates[0]);
    console.log('Body:', data.features[0].geometry.coordinates[1]);


    
    if($(obiekt).hasClass('to_api_city')) { 
        $(".from_api_city_hidden_lat").val(data.features[0].geometry.coordinates[0]);
        $(".from_api_city_hidden_lon").val(data.features[0].geometry.coordinates[1]);
    }
    if($(obiekt).hasClass('from_api_city')) { 
    
    $(".to_api_city_hidden_lat").val(data.features[0].geometry.coordinates[0]);
    $(".to_api_city_hidden_lon").val(data.features[0].geometry.coordinates[1]);
    }
    

  }
};

request.send();
})

</script>

