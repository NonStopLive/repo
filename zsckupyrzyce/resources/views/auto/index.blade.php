
@if(Route::currentRouteName() == 'kalkulator')
@include('head')
@endif
<style>
p{
    margin: 0;
}
</style>
<h1>Oblicz poziom zanieczyszeń auta</h1>
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
                zawartosc_pozycji += '<p><input type="text" class="form-control" placeholder="Od:" id="y" name="from" data-id="'+count+'"/><input type="text" class="form-control" placeholder="Paliwo:" id="paliwo" name="from" data-id="'+count+'" /></p><p><input type="text" class="form-control" placeholder="Do:" id="x" name="to" data-id="'+count+'" /><input type="text" class="form-control" placeholder="Średnie spalanie:" id="ssp" name="from" data-id="'+count+'" /></p><button id="del" name="del" onclick="usunPozycje('+count+')" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">-</button>';
                p.innerHTML = zawartosc_pozycji;
                document.querySelector("#putin").appendChild(p);
            }
            function usunPozycje(){
                count--;

                console.log();
            }
            </script>
            <form method="post" action="{{route('kalkulator_wynik')}}">
               @csrf
            <div id="putin"> <!-- .setAttribute('data-id',x); -->
            <div class="input-group mb-3">
                <p><input type="text" class="form-control" placeholder="Od:" id="y" name="from" data-id="1" />
                <input type="text" class="form-control" placeholder="Paliwo:" id="paliwo" name="from" data-id="1" /></p>
                <p><input type="text" class="form-control" placeholder="Do:" id="x" name="to" data-id="1" />
                <input type="text" class="form-control" placeholder="Średnie spalanie:" id="ssp" name="from" data-id="1" /></p>
            <button id="add" name="add" onclick="dodajPozycje()" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">+</button>
            </div>
      
 
            </div>
            <div class="input-group-append">
            <div class="input-group mb-3">
            <input type="submit" id="oblicz" value="PRZELICZ" onclick="oblicz()"/>
        </form>
            <div class="wynik">
                
</div>
</div>
</div>

</div>

