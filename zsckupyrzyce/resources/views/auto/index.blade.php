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
                var p = document.createElement("p");
                p.setAttribute('data-id', count);
                var zawartosc_pozycji ='';
                zawartosc_pozycji += '<input type="text" class="form-control" placeholder="Od:" id="x" name="from" data-id="'+count+'" style="width: 30%;"/><input type="text" class="form-control" placeholder="Do:" id="y" name="to" data-id="'+count+'" style="width: 30%;"/><button id="del" name="del" onclick="usunPozycje(this)" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">-</button></div>';
                p.innerHTML = zawartosc_pozycji;
                document.querySelector("#putin").appendChild(p);
            }
            function usunPozycje(obiekt){
                console.log(obiekt);
                

            }
            </script>
            <div id="putin"> <!-- .setAttribute('data-id',x); -->
                
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Od:" id="x" name="from" data-id="1" style="width: 30%;"/>
                <input type="text" class="form-control" placeholder="Do:" id="y" name="to" data-id="1" style="width: 30%;"/>
            <button id="add" name="add" onclick="dodajPozycje()" class="btn btn-outline-primary btn-rounded waves-effect" style="border-radius:50%;height:40px;width:40px;">+</button>
            </div>
      
 
            </div>
                <div class="input-group-append">
            <div class="input-group mb-3">
            <!-- <input type="button" id="oblicz" value="PRZELICZ" onclick="oblicz()"/> -->
            <div class="wynik">
                
</div>
</div>
</div>

</div>

