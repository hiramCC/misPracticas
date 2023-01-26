<?php

class practicas extends CI_Controller{

    function __construct(){
        parent::__construct();
        //$this->load->model('');
    }

    public function viewEjemplo(){
        $this->load->view('view_practica');

    }
}