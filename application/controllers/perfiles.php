<?php
class Perfiles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Perfiles_model');
    }

   
    public function index()
    {
		$this->load->view('templates/navbar');
		$this->load->view('view_perfiles');
		$this->load->view('templates/footer');
    }


    public function registrar()
    {
      $datos = array('nombre' => trim($this->input->post('perfil')));
      if(empty($this->input->post('id'))){
		    $response = $this->Perfiles_model->insert($datos);
		      if ($response == TRUE) {
            echo  json_encode("Regitro exitoso");
		      }else {
			      echo  json_encode("No fue posible realizar el resgistro, contacta a soporte");
		    }
      }else{
        $id = $this->input->post('id');
		    $result = $this->Perfiles_model->update($id, $datos);
		      if ($result == TRUE) {
            echo  json_encode("Actualizacion exitosa");
		      }else {
			      echo  json_encode("No fue posible realizar la actualizacion, contacta a soporte");
		    }
      }   
    }

    public function listar()
	{	
    $objLista =  $this->Perfiles_model->readData();
    $data = array();

    foreach ($objLista as $key) {
        $btn = '<center><button type="button" id="'.$key['id'].'" class="btn btn-default update"><span class="glyphicon glyphicon-pencil"></span></button>&nbsp&nbsp&nbsp<button type="button" class="btn btn-danger delete" id="'.$key['id'].'"><span class="glyphicon glyphicon-trash"></span></button></center>';
        $row = array();
        $row[] = '<center>'.$key['id'].'</center>';
        $row[] = '<center>'.$key['Nombre'].'</center>';
        $row[] = $btn ;
        $data[] = $row;
    }
    $result  = array('data' => $data);
    echo json_encode($result);

	}
  public function actualizar()
	{
    $id=$this->input->post('idback');
    $data = $this->Perfiles_model->fetch($id);
		echo json_encode($data);
	}

  public function delete() {
    $id=$this->input->post('idback'); 
    if(empty($this->Perfiles_model->verify($id))){
      $result = $this->Perfiles_model->delete($id);
		    if ($result == TRUE) {
			    echo json_encode("Perfil eliminado");  
		    }else{
			    echo json_encode ("No fue posible eliminarlo");
		  }  
    }else{
      echo json_encode("el perfil esta asociado a uno o mas usuarios ");
    }
		
	}
}