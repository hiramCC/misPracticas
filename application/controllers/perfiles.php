<?php
    class perfiles extends CI_Controller{

        public function construct(){
            parent::construct();
            $this->load->model('perfil_model');
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
			
				$result = $this->perfil_model->insert($datos);
				if ($result == TRUE){
					return json_encode("Registro exitoso");
				}else{
					return json_encode("No fue posible realizar el registro");
		        }
	        
        }
        public function listar()
	{
		$response = $this->perfil_model->readData();
		echo json_encode($response);
	}

    }
?>