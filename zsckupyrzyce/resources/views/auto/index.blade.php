@include('head')
<h1>Oblicz poziom zanieczyszen auta</h1>
<div class="panel">
    <script type="text/javascript"> 
        var wynik;
            function oblicz() {
              var x = document.querySelector('#x').value;
              var y = document.querySelector('#i').value;
              var normalny = document.querySelector('#normalny').checked;
              var ulgowy = document.querySelector('#ulgowy').checked;
            if (x <= 0 || y <= 0){
                document.querySelector(".wynik").innerHTML = "Podaj prawidłową odległość, ilość, lub wybierz rodzaj biletu!"}
            else if (normalny == true ) {
            document.querySelector(".wynik").innerHTML = x;
            }
            else if (ulgowy == true ) {
            document.querySelector(".wynik").innerHTML = x;
            }
            }
            </script>
            <h1>Biletomat</h1>
            Odległość od: <input type="number" id="x" name="pole"/>
            
            Odległość do: <input type="number" id="y" name="polle"/>
            
            <button id="normalny" name="add">+</button>
            <button id="ulgowy" name="del">-</button>
            
            <!-- <input type="button" id="oblicz" value="PRZELICZ" onclick="oblicz()"/> -->
                
            <div class="wynik">
                
</div>
{{route("kalkulator")}}