<?php

class Welcome_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
        //if(!$this->session->userdata('nombre')){redirect(auth);}
    }

    private $table  = 'preregistro' ;

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
        $rstQuery = $this->db->get_where($this->table, array('id_preregistro' => $id));
        return $rstQuery->result_array();
        
    }

    public function update($id, $data){
        $this->db->where('id_preregistro', $id);
        $isOkey = $this->db->update($this->table, $data);
        return ($isOkey == true) ? true : false;
    }
    public function delete($id){
        $this->db->where('id_preregistro', $id);
        $isOkey = $this->db->delete($this->table);
        
       return ($isOkey == true) ? true : false;
    }
    function checkemail($email){
		return ($this->db->get_where($this->table, array('email' => $email))->num_rows()>0) ? true : false;
	}

}