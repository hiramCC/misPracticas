<?php

class Auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    private $table  = 'preregistro';

    public function selectUser($usuario, $password)
    {
        #print_r($usuario, $password); exit();

        $rstQuery = $this->db->get_where($this->table, array('correo' => $usuario, 'contrasenia' => $password ));
        if ($rstQuery->num_rows() == 1) {
            $result = $rstQuery->row_array();
            #print_r($result); exit();
            return $result;
        } else {
            return false;
        }
    }

    public function verificaExistencia($usuario)
    {
        #print_r($usuario, $password); exit();

        $rstQuery = $this->db->get_where($this->table, array('correo' => $usuario));
        if ($rstQuery->num_rows() > 0) {
            #$result = $rstQuery->row_array();
            #print_r($result); exit();
            return true;
        } else {
            return false;
        }
    }
}