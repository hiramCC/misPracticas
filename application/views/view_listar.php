<div class="container inicio" style="margin-top:50px;">
    <?php
        if($this->session->flashdata('success')){
            echo "<div class=\"alert alert-success\"><strong>Hola! </strong>";
            echo $this->session->flashdata('success');
            echo "</div>";
        }        
    ?>

    <h2>Lista de registro</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Tipo de usuario</th>
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
                <td><?php echo $row['email']; ?></td>
                <?php 
                if($row['tipo']==2){
                  echo "<td>Usuario</td>";
                }else{
                  echo "<td>Administrador</td>";
                }
                ?>
                <td>
                    <center>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button"
                                data-toggle="dropdown">Acciones
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('welcome/actualizar').'/'.$row['id_preregistro']; ?>"><span
                                            class="glyphicon glyphicon-pencil"> Editar</span> </a> </li>
                                <li> <a href="<?php echo base_url('welcome/delete').'/'.$row['id_preregistro']; ?>"><span
                                            class="glyphicon glyphicon-trash"> Eliminar</span></a></li>
                            </ul>
                        </div>
                    </center>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>