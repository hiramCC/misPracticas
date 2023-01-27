<?php

class auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
       
    }
    private $table  = 'preregistro' ;


    public function validacionUsuario($user,$pwd)
    {
        $query =$this->db->get_where($this->table, array('email' => $user));
        if($query->num_rows()==1){
            $result=$query->row_array();
            if(password_verify($pwd, $result['password'])==TRUE){   
                return $result;
                }else{
                    $this->session->set_flashdata('error', '  Contraseña incorrecta '); 
            return false; 
              
            }
        }else{
            return false;
        }
    }
}