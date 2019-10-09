@include('head')
<style>
p{
    margin: 0;
}
</style>
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
            var count=1
            function dodajPozycje(){
                var p = document.createElement("p");
                var zawartosc_pozycji ='';
                zawartosc_pozycji += '<br>Odległość od: <input type="number" id="x" name="from"44/>';
                zawartosc_pozycji += ' Odległość do: <input type="number" id="y" name="to"/>';
                zawartosc_pozycji += ' <button id="del" name="del" onclick="usunPozycje()">-</button>';
                p.innerHTML = zawartosc_pozycji;
                document.querySelector("#putin").appendChild(p);
            }
            function usunPozycje(){
                
            }
            </script>
            <p id="putin">
            Odległość od: <input type="number" id="x" name="from"/>
            Odległość do: <input type="number" id="y" name="to"/>
            <button id="add" name="add" onclick="dodajPozycje()">+</button>
            </p>
            <!-- <input type="button" id="oblicz" value="PRZELICZ" onclick="oblicz()"/> -->
                
            <div class="wynik">
                
</div>
{{route("kalkulator")}}