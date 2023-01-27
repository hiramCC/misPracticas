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
        <div class="col-sm-6">
            <h1>Calculadora monumental del olimpo en JQuery</h1>
            <form autocomplete="false" id="myForm">

                <label class="radio-inline"><input type="radio" id="sumar" name="opt">Sumar</label>
                <label class="radio-inline"><input type="radio" id="restar" name="opt">Restar</label>
                <label class="radio-inline"><input type="radio" id="multiplicar" name="opt">Multiplicar</label>
                <label class="radio-inline"><input type="radio" id="dividir" name="opt">Dividir</label>
                <div class="form-group">
                    <label for="numero1">Numero 1</label>
                    <input type="number" class="form-control" id="numero1">
                </div>
                <div class="form-group">
                    <label for="numero2">Numero 2</label>
                    <input type="number" class="form-control" id="numero2">
                </div>

                <button type="button" onclick="operaciones()">Aceptar</button>
            </form>
            <div id="sumando"></div>
            <p id="test"></p>
            <br>
            <br>
        </div>
    </div>
    <div class="row">
                <div class="col-sm-6">
                    <span id="msg-data"></span>
                    <h2>Validando datos</h2>
                    <form id="frmRegistro">
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="apaterno">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apaterno" name="apaterno">
                        </div>
                        <div class="form-group">
                            <label for="amaterno">Apellido Materno:</label>
                            <input type="text" class="form-control" id="amaterno" name="amaterno">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Password:</label>
                            <input type="password" class="form-control" id="pwd2" name="pwd2">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
                <div class="col-sm-6"></div>
            </div>
    </div>
</body>

</html>

<script>
$(document).ready(function() {
    //alert()
    //var numero1 = document.getElementById("numero1").value; == //var contents = $('#numero1')[0];
    //alert(numero1);

    //alert(contents);

    $('#frmRegistro').on("submit", function(e) {
        e.preventDefault();
        let dataString = $('#frmRegistro').serialize();
        $.ajax({
            url: "<?php echo base_url('practicas/registrar')?>",
            method: 'POST',
            data: dataString,
            success: function(response) {
                $('.form-group').removeClass('has-error').removeClass('has-success');
                $('.text-danger').remove();
                var data = JSON.parse(response);
                console.log(data.success);
                if(data.success == true){
                    $('#msg-data').html(data.messages);
                    limpiar();
                }else{
                    $.each(data.messages, function(key,value){
                        var element = $('#' + key);
                        element.closest('div.form-group')
                        .removeClass('has-error')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                        .find('.text text-danger')
                        .remove();
                        element.after(value);
                    });
                }
            }

        });
    });

});
function limpiar(){
    setTimeout(function(){
       $("#msg-data").hide("slow");
       //$("·msg-data").html(''); 
    }, 2000);
    $('#frmRegistro')[0].reset();
}
/* 
function operaciones() {
    var x, y, suma, resta, multiplica, divide;
    x = parseFloat(document.getElementById("numero1").value);
    y = parseFloat(document.getElementById("numero2").value);

    if ($("#numero1").empty() || $("#numero2").empty()) {
        //document.getElementById("sumando").innerHTML = '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
        //let reset = setTimeout(clear, 3000);
        if ($('#sumar').is(':checked')) {
            if (!$('#numero1').val() || !$('#numero2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                suma = parseFloat(x) + parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-success"><strong> El resultado es :' + suma + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(suma);
            }

        } else if ($('#restar').is(':checked')) {
            if (!$('#numero1').val() || !$('#numero2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                resta = parseFloat(x) - parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-success"><strong> El resultado es :' + resta + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(resta);
            }
        } else if ($('#multiplicar').is(':checked')) {
            if (!$('#numero1').val() || !$('#numero2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                multiplica = parseFloat(x) * parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-success"><strong> El resultado es :' + multiplica + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(multiplica);
            }
        } else if ($('#dividir').is(':checked')) {
            if (!$('#numero1').val() || !$('#numero2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                divide = parseFloat(x) / parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<div class="alert alert-success"><strong> El resultado es :' + divide + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(divide);
            }
        } else {
            document.getElementById("sumando").innerHTML =
                '<div class="alert alert-warning"><strong> Selecciona que operacion quieres realizar </strong></div>';
            let reset = setTimeout(clear, 4000);
        }
    }
    document.getElementById("myForm").reset();
    //document.getElementById("sumando").reset();

}

function clear() {
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
*/
</script>