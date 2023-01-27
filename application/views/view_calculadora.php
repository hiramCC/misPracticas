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
        <h1>Calculadora</h1>
        <form autocomplete="false" id="myForm">
            <label class="radio-inline"><input type="radio" id="sumar" name="opt">Sumar</label>
            <label class="radio-inline"><input type="radio" id="restar" name="opt">Restar</label>
            <label class="radio-inline"><input type="radio" id="multiplicar" name="opt">Multiplicar</label>
            <label class="radio-inline"><input type="radio" id="dividir" name="opt">Dividir</label>
            <div class="form-group">
                <label for="numero1">Numero 1</label>
                <input type="number" class="form-control" id="n1">
            </div>
            <div class="form-group">
                <label for="numero2">Numero 2</label>
                <input type="number" class="form-control" id="n2">
            </div>
            <button type="button" onclick="operaciones()">Aceptar</button>
        </form>
        <div id="sumando"></div>
        <p id="test"></p>
    </div>
    <br>
    <div class="container" style="margin-top:50px;">
        <!-- <p> <?php #echo $this->session->flashdata('success')?> </p> -->
        <h2>Registro de Participante </h2>
        <span id="msg-data"></span>
        <form id="frmRegistro">
            <!-- <?php #echo validation_errors(); ?> -->
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
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="form-group">
                <label for="pwd2">Contraseña:</label>
                <input type="password" class="form-control" id="pwd2" name="pwd2">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>


    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#frmRegistro').on("submit", function(e) {
        e.preventDefault();
        let dataString = $('#frmRegistro').serialize();
        // alert(dataString)
        $.ajax({
            url: "<?php echo base_url('Calcu/registrar') ?>",
            method: 'POST',
            data: dataString,
            success: function(response) {
                $(".text-danger").remove();
                document.getElementById('frmRegistro').reset();
                var data = JSON.parse(response);
                if (data.success == true) {
                    $('#msg-data').html(data.messages);
                    limpiarForm();
                } else {

                    $.each(data.messages, function(key, value) {
                        let element = $("#" + key);
                        let div = element.closest(".form-group");
                        div.after(value);
                    });

                }
            }
        })
    });

    function limpiarForm() {
        if ($('#msg-data').is(':visible')) {
            setTimeout(function() {
                $('#msg-data').hide('hide');
            }, 2000);
        } else {
            $('#msg-data').show();
            setTimeout(function() {
                $('#msg-data').hide('hide');
            }, 2000);
        }
        
        document.getElementById('frmRegistro').reset();
    }
});
/* 
function operaciones() {
    var x, y, suma, resta, multiplica, divide;
    x = parseFloat(document.getElementById("n1").value);
    y = parseFloat(document.getElementById("n2").value);

    if ($("#n1").empty() || $("#n2").empty()) {
        if ($('#sumar').is(':checked')) {
            if (!$('#n1').val() || !$('#n2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                suma = parseFloat(x) + parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-success"><strong> El resultado es :' + suma + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(suma);
            }

        } else if ($('#restar').is(':checked')) {
            if (!$('#n1').val() || !$('#n2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                resta = parseFloat(x) - parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-success"><strong> El resultado es :' + resta + '</strong></div>';
                let reset = setTimeout(clear, 3000);
            }
        } else if ($('#multiplicar').is(':checked')) {
            if (!$('#n1').val() || !$('#n2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                multiplica = parseFloat(x) * parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-success"><strong> El resultado es :' + multiplica + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(multiplica);
            }
        } else if ($('#dividir').is(':checked')) {
            if (!$('#n1').val() || !$('#n2').val()) {
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-danger"><strong> Metele datos papi </strong></div>';
                let reset = setTimeout(clear, 3000);
            } else {
                divide = parseFloat(x) / parseFloat(y);
                document.getElementById("sumando").innerHTML =
                    '<br><div class="alert alert-success"><strong> El resultado es :' + divide + '</strong></div>';
                let reset = setTimeout(clear, 3000);
                //alert(divide);
            }
        } else {
            document.getElementById("sumando").innerHTML =
                '<br><div class="alert alert-warning"><strong> Selecciona que operacion quieres realizar </strong></div>';
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
    x = document.getElementById("n1").value;
    y = document.getElementById("n2").value;
    suma = parseFloat(x) + parseFloat(y);
    document.getElementById("sumando").innerHTML = suma;
    alert(suma);
} */
</script>