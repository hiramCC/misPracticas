<?php

class perfiles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('perfiles_model');
    }

    public function index(){
        $this->load->view('view_header');
		$this->load->view('view_perfiles');
		$this->load->view('view_footer');
    }
    
    public function registrar()
    {

        $datos = array(
			'nombre_perfil' => trim($this->input->post('perfil'))
		);

		$response = $this->perfiles_model->insert($datos);
		if ($response == TRUE) {
			# code...
            echo  json_encode("Regitro exitoso");

		} else {

			echo  json_encode("No fue posible realizar el resgistro, conacta a soporte");
		}


    }

    public function listar()
	{
		
		//$response =  $this->Perfiles_model->readData();
        //echo json_encode($response);
        $objLista =  $this->perfiles_model->readData();
        $data = array();

        foreach ($objLista as $key) {
            $btn = '<center><button type="button" id="'.$key['id_perfil'].'" class="btn btn-default update"><span class="glyphicon glyphicon-pencil"></span></button>&nbsp&nbsp&nbsp<button type="button" class="btn btn-danger delete" id="'.$key['id_perfil'].'"><span class="glyphicon glyphicon-trash"></span></button></center>';
            $row = array();
            $row[] = $key['id_perfil'];
            $row[] = $key['nombre_perfil'];
            $row[] = $btn;
            $data[] = $row;
        }
        $result  = array('data' => $data);
        echo json_encode($result);

}
    public function actualizar()
    {
        $idback = $this->input->post('idback');
        $data = $this->perfiles_model->fetch($idback);
        echo json_encode($data);
    }
}

?>