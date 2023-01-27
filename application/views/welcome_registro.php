<div class="container" style="margin-top:50px;">
    <p>  <?php echo $this->session->flashdata('success')?> </p>
    <h2>Registro de Participante </h2>
    <form action="<?php echo base_url('Welcome/registrar') ?>" method="post">
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
        <div class="form-group ">
            <label for="sel1">Tipo de registro:</label><br>
            <select class="form-control-sm-8" id="sel1" name="tipo">
                <option>Administrador</option>
                <option>Usuario</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>


</div>