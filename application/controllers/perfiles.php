<?php
    class Perfiles extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Perfil_model');
        } 

        public function index(){
            $this->load->view('view_header');
            $this->load->view('view_perfiles');
            $this->load->view('view_footer');

        }

        public function registrar()
        {
        //var_dump($_POST);
        //print_r($_POST);
        //echo $this->input->post('perfil');
         $datos = array(
		 	'nombre_perfil' => trim($this->input->post('perfil'))
         );
			
				$result = $this->Perfil_model->insert($datos);
				if ($result == TRUE){
					echo json_encode("Registro exitoso");
				}else{
					echo json_encode("No fue posible realizar el registro");
		        }
	        
        }
        public function listar()
	    {
		$response = $this->Perfil_model->readData();
		echo json_encode($response);
	    }

    }
?>