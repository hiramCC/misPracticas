<div class="container" style="margin-top:50px;">
    <?php #print_r($preregistro); ?>

    <h2>Actualizar Datos de Participante</h2>
    <form action="<?php echo base_url('Welcome/update') ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?php echo $preregistro[0]['nombre']; ?>">
        </div>
        <div class="form-group">
            <label for="apaterno">Apellido Paterno:</label>
            <input type="text" class="form-control" id="apaterno" name="apaterno"
                value="<?php echo $preregistro[0]['apaterno']; ?>">
        </div>
        <div class="form-group">
            <label for="amaterno">Apellido Materno:</label>
            <input type="text" class="form-control" id="amaterno" name="amaterno"
                value="<?php echo $preregistro[0]['amaterno']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php echo $preregistro[0]['email']; ?>">
        </div>
        <!-- <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pwd"
                value="<?php echo $preregistro[0]['password']; ?>">
        </div> -->
        <div class="form-group">
            <label for="sel1">Tipo de registro:</label><br>
            <select class="form-control-sm-8" id="sel1" name="tipo">
                <?php
                if($preregistro[0]['tipo']==1){
                    echo "<option selected>Administrador</option>";
                    echo "<option >Usuario</option>";
                }
                else{
                    echo "<option>Administrador</option>";
                    echo "<option selected>Usuario</option>";
                }
                ?>

            </select>
        </div>
        <input type="hidden" name="id_preregistro" value="<?php echo $preregistro[0]['id_preregistro']; ?>">
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>


</div>