<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model'); //aqui cargamos nuetro modelo
		// include 
	}
	

	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('Welcome_message');
		$this->load->view('view_footer');
	}
	public function userindex(){
		$this->load->view('view_header');
		$this->load->view('view_usuario');
		$this->load->view('view_footer');
	}

	public function listar()
	{
		#print_r($this->Welcome_model->readData());
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('view_header');
		$this->load->view('view_registro', $data);
		$this->load->view('view_footer');
	}


	public function registrar(){
		#print_r($_POST);
		#var_dump($_POST);
		if($this->input->post('rol')=='admin'){
			$rol=1;
		}else{
			$rol=2;
		}
		$datos = array(
			'nombre' => trim(mb_strtoupper($this->input->post('nombre'))),
			'apaterno' => trim(mb_strtoupper($this->input->post('apaterno'))),
			'amaterno' => trim(mb_strtoupper($this->input->post('amaterno'))),
			'correo' => trim($this->input->post('email')),
			'contrasenia' => trim(sha1($this->input->post('pwd'))),
			'rol' => intval($rol)
			);

		
		$result = $this->Welcome_model->insert($datos);
		if ($result == TRUE) {
			# code...
			echo 'Registro Exitoso';
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}

		

	
	}


	public function actualizar($id)
	{
		$data['preregistro'] = $this->Welcome_model->fetch($id);
	#	var_dump($data);exit();
	
		$this->load->view('view_header');
		$this->load->view('view_editar', $data);
		$this->load->view('view_footer');
	}

	public function update()
	{
		if($this->input->post('rol')=='admin'){
			$rol=1;
		}else{
			$rol=2;
		}
		$datos = array(
			'nombre' => trim(mb_strtoupper($this->input->post('nombre'))),
			'apaterno' => trim(mb_strtoupper($this->input->post('apaterno'))),
			'amaterno' => trim(mb_strtoupper($this->input->post('amaterno'))),
			'correo' => trim($this->input->post('email')),
			'contrasenia' => trim($this->input->post('pwd')),
			'rol' => intval($rol)
			);

			$id = $this->input->post('id_preregistro');

		$result = $this->Welcome_model->update($id, $datos);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}

	public function delete($id)
	{
		$result = $this->Welcome_model->delete($id);
		if($result == TRUE){
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
		
		
	}

	

}