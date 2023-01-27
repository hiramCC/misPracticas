<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    

</head>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">C R U D</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url('Welcome/')?>">Home</a></li>
                <?php if($this->session->userdata('tipo')==1){?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuracion <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Welcome/registroUsuario')?>">Registro de Usuario</a></li>
                        <li><a href="<?php echo base_url('Welcome/listar')?>">Lista de Usuarios</a></li>
                        <li><a href="<?php echo base_url('Welcome/')?>">Perfiles</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <?php }else if($this->session->userdata('tipo')==2){?>
                <li><a href="#">Page 2</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>       <?php echo $this->session->userdata('nombre')?></a></li>
                <li><a href="<?php echo base_url('Auth/cerrarSesion')?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
            </ul>
        </div>
    </nav>
    <!-- <div class="logo">
            <a href="<?php echo base_url('Welcome/index');?>">C R U D </a>
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="<?php echo base_url('Welcome/listar');?>">Lista</a></li>
                <li><a href="#">Pagina 1</a></li>
                <li><a href="<?php echo base_url('Auth/cerrarSesion');?>">Log out</a></li>
           </ul>            
        </nav> -->

<body>