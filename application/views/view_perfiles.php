<div class="container">

    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Open Modal</button>


    <table class="table table-hover" id="myTable">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de usuario</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" id="form" action="">
                        <div class="form-group">
                            <label for="perfil">Usuario</label>
                            <input type="text" class="form-control" id="perfil" name="perfil">
                        </div>
                        <button type="button" id="save" class="btn btn-success">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script type='text/javascript'>
$(document).ready(function() {
    //alert('Hola mundo')
    //console.log('Hola mindo desde una consola')


    $('#save').click(function(e) {
        // evitar lo que pasaría por default
        e.preventDefault();

        alert($("form").serialize());

        $.ajax({
            url: "<?php echo base_url('perfiles/registrar') ?>",
            method: 'POST',
            data: $("form").serialize(),
            cache: false,
            //contentType: false,
            //processData: false,
            dataType: 'json',
            success: function(datos) {
                // var data = JSON.parse(respuesta);

            }
        })
    });
    $('#myTable').DataTable({
            ajax: {
                url: <?php echo base_url('perfiles/listar')?>
            }
            columns: [{
                    data: 0
                },
                {
                    data: 1
                },
                {
                    data: 2
                },
                {
                    data: 3
                },
                {
                    data: 4
                },
                {
                    data: 5
                }
            ]
        }


    );
});
</script>