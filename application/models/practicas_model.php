<?php

class practicas_model extends CI_Model {

    function __construct() {
        parent::__construct();
        #$this->load->database();
    }

    private $table  = '' ;

    public function insert($data)
    {
        $isOkey = $this->db->insert($this->table, $data);
        return ($isOkey == true) ? true : false;
    }
}

?>