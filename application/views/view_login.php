<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style>
.body {
    background-color: #FDFDFD;
}

.inicio {
    margin-top: 15%;
    background-color: ;

}
</style>

<body>

    <div class="container inicio">
        <?php
            if($this->session->flashdata('error')){
                echo "<div class=\"alert alert-warning\"><strong>Warning!</strong>";
                echo $this->session->flashdata('error');
                echo "</div>";
            }else  if($this->session->flashdata('warning')){
                echo "<div class=\"alert alert-danger\"><strong>Danger!</strong>";
                echo $this->session->flashdata('warning');
                echo "</div>";
            }           
        ?>
        <h2>Inicia Sesion</h2>

        <form class="form-horizontal" action="<?php echo base_url('Auth/ingresar');?>" method="post">
            <div class="form-group">

                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña" name="pwd">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="checkbox">
                        <a href="<?php echo base_url('welcome/registroUsuario'); ?>"><span
                                class="glyphicon glyphicon-user"></span>
                            Registrarse</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-default">Ingresar</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>