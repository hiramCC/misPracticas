<div class="container">
    <h2>Lista de registro</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>
                    <center>Acciones</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php #var_dump($preregistro); ?>
            <?php foreach($preregistros as $row) { ?>
            <tr>

                <td><?php echo $row['id_preregistro']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apaterno']; ?></td>
                <td><?php echo $row['amaterno']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">acciones
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('welcome/actualizar').'/'.$row['id_preregistro']; ?>"><span
                            class="glyphicon glyphicon-pencil"></span>editar</a></li>
                            <li><a href="<?php echo base_url('welcome/eliminar').'/'.$row['id_preregistro']; ?>"><span
                            class="glyphicon glyphicon-erase"></span>eliminar</a></li>
                            
                        </ul>
                    </div>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>

</html>