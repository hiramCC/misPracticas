<?php

class perfiles_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
    }

    private $table  = 'cat_perfiles';
    private $primary_key = 'id_perfil';

    public function insert($data)
    {
        $isOkey = $this->db->insert($this->table, $data);
        return ($isOkey == true) ? true : false;
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
        $this->db->delete($this->table, array($this->primary_key => $id));
    }

    public function join($id){
        $isOkey = $this->db->get_where('preregistro',array('rol' => $id));
        return $isOkey->result_array();
    }

}