<?php

class Perfiles_model extends CI_Model {


    function __construct() {
        parent::__construct();
        #$this->load->database();
        // if(!$this->session->userdata('nombre')){redirect(auth);}
    }
    private $table  = 'roles' ;
    private $primary_key  = 'id' ;
    public function insert($data)
    {
        return ($this->db->insert($this->table, $data) == true) ? true : false;
    }
    public function readData()
    {
        $rstQuery = $this->db->get($this->table);
        return $rstQuery->result_array();
    }

    public function fetch($id)
    {
        $rstQuery = $this->db->get_where($this->table, 
                        array($this->primary_key => $id)
                        );
        return $rstQuery->row_array();
    }

    public function update($id, $data){
        $this->db->where($this->primary_key, $id);
        $isOkey = $this->db->update($this->table, $data);
        return ($isOkey == true) ? true : false;
    }
    public function delete($id){
        $this->db->where('id', $id);
        $isOkey = $this->db->delete($this->table);
        
       return ($isOkey == true) ? true : false;
    }
    public function verify($id){
        $isOkey = $this->db->get_where('preregistro',array('tipo' => $id));
        return $isOkey->result_array();
    }

}