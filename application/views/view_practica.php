<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Calculadora monumental del olimpo en JQuery</h1>
        <form autocomplete="false" id="myForm">

            <label class="radio-inline"><input type="radio" id="sumar" name="opt">Sumar</label>
            <label class="radio-inline"><input type="radio" id="restar" name="opt">Restar</label>
            <label class="radio-inline"><input type="radio" id="multiplicar" name="opt">Multiplicar</label>
            <label class="radio-inline"><input type="radio" id="dividir" name="opt">Dividir</label>
            <div class="form-group">
                <label for="numero1">Numero 1</label>
                <input type="number"  class="form-control" id="numero1">
            </div>
            <div class="form-group">
                <label for="numero2">Numero 2</label>
                <input type="number" class="form-control" id="numero2">
            </div>

            <button type="button" onclick="operaciones()">Aceptar</button>
        </form>
        <div id="sumando"></div>
        <p id="test"></p>
    </div>

</body>

</html>
<script>
$(document).ready(function() {
    //alert()
    //var numero1 = document.getElementById("numero1").value; == //var contents = $('#numero1')[0];
    //alert(numero1);

    //alert(contents);

});

function operaciones() {
    var x, y, suma, resta, multiplica, divide;
    x = parseFloat(document.getElementById("numero1").value);
    y = parseFloat(document.getElementById("numero2").value);
    
    if($("#numero1").empty() || $("#numero2").empty() ){
        document.getElementById("sumando").innerHTML = '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
        let reset = setTimeout(clear, 3000);
    if ($('#sumar').is(':checked')) {
        if((isset($("#numero1")) || isset($("#numero1"))) && ($("#numero1").empty() || $("#numero2").empty() )){
            document.getElementById("sumando").innerHTML = '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
            let reset = setTimeout(clear, 3000);
        }else{
            suma = parseFloat(x) + parseFloat(y);
            document.getElementById("sumando").innerHTML = '<div class="alert alert-success"><strong> El resultado es :'+suma+ '</strong></div>';
            let reset = setTimeout(clear, 3000);
        //alert(suma);
        }
        
    } else if($('#restar').is(':checked')){
        resta = parseFloat(x) - parseFloat(y);
        document.getElementById("sumando").innerHTML = '<div class="alert alert-success"><strong> El resultado es :'+resta+'</strong></div>';
        let reset = setTimeout(clear, 3000);
        //alert(resta);
    } else if($('#multiplicar').is(':checked')){
        multiplica = parseFloat(x) * parseFloat(y);
        document.getElementById("sumando").innerHTML = '<div class="alert alert-success"><strong> El resultado es :'+multiplica+ '</strong></div>';
        let reset = setTimeout(clear, 3000);
        //alert(multiplica);
    } else if($('#dividir').is(':checked')){
        divide = parseFloat(x) / parseFloat(y);
        document.getElementById("sumando").innerHTML = '<div class="alert alert-success"><strong> El resultado es :'+divide+ '</strong></div>';
        let reset = setTimeout(clear, 3000);
        //alert(divide);
    }
}
    document.getElementById("myForm").reset();
    //document.getElementById("sumando").reset();

}
function clear(){
    document.getElementById("sumando").innerHTML = '';
}
function myFunction() {
    var x, y, suma;
    x = document.getElementById("numero1").value;
    y = document.getElementById("numero2").value;
    suma = parseFloat(x) + parseFloat(y);
    document.getElementById("sumando").innerHTML = suma;
    alert(suma);
}
</script>