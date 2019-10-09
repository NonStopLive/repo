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
                /*why are we still here? Just to suffer?*/
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
                count++;
                var p = document.createElement("p");
                p.setAttribute('data-id', count);
                var zawartosc_pozycji ='';
                zawartosc_pozycji += '<br>Od: <input type="text" class="form-control" id="x" name="from" data-id="'+count+'"/>';
                zawartosc_pozycji += ' Do: <input type="text" class="form-control" id="y" name="to" data-id="'+count+'"/>';
                zawartosc_pozycji += ' <button id="del" name="del" onclick="usunPozycje(this)" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">-</button>';
                p.innerHTML = zawartosc_pozycji;
                document.querySelector("#putin").appendChild(p);
            }
            function usunPozycje(obiekt){
                console.log(obiekt);
                

            }
            </script>
            <p id="putin"> <!-- .setAttribute('data-id',x); -->
            Od: <input type="text" class="form-control" id="x" name="from" data-id="1"/>
            Do: <input type="text" class="form-control" id="y" name="to" data-id="1"/>
            <button id="add" name="add" onclick="dodajPozycje()" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">+</button>
            </p>
            </div>
                <div class="input-group-append">
            <div class="input-group mb-3">
            <!-- <input type="button" id="oblicz" value="PRZELICZ" onclick="oblicz()"/> -->
                
            <div class="wynik">
                
</div>
