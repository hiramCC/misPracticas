<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
		 //aqui cargamos nuetro modelo
		// include 
	}
	

	public function index()
	{
		$this->load->helper('url'); 
		$this->load->view('templates/navbar');	
		$this->load->view('templates/bienvenida');	
		$this->load->view('templates/footer');
		
	}
	public function registroUsuario()
	{ 
		$this->load->view('templates/navbar');
		$this->load->view('welcome_registro');
		$this->load->view('templates/footer');
		
		
	}

	public function listar()
	{
		#print_r($this->Welcome_model->readData());
		$data['preregistros'] = $this->Welcome_model->readData();
		$this->load->view('templates/navbar');
		$this->load->view('view_listar', $data);
		$this->load->view('templates/footer');
	}


	public function registrar(){
		if($this->input->post('tipo')=='Administrador'){
			$tip=1;
		}else{
			$tip=2;
		}
		$datos = array(
		'nombre' => strtoupper(trim($this->input->post('nombre'))),
		'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
		'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
		'email' =>trim($this->input->post('email')),
		'password' => password_hash(trim($this->input->post('pwd')), PASSWORD_DEFAULT) ,
		'tipo' =>intval($tip)
			);
		if($this->Welcome_model->checkemail($datos['email'])){
			echo 'El email ya ha sido registrado';
			
		}else{
			$result = $this->Welcome_model->insert($datos);
			if ($result == TRUE) {
			redirect('Welcome/listar');
			}else{
			echo 'Contacta a soporte';
			}
		}
		
	}
	public function registrarUser(){
		$datos = array(
		'nombre' => strtoupper(trim($this->input->post('nombre'))),
		'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
		'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
		'email' =>trim($this->input->post('email')),
		'password' => password_hash(trim($this->input->post('pwd')), PASSWORD_DEFAULT)
			);
		if($this->Welcome_model->checkemail($datos['email'])){
			echo 'El email ya ha sido registrado';
			
		}else{
			$result = $this->Welcome_model->insert($datos);
			if ($result == TRUE) {
			redirect('Auth');
			}else{
			echo 'Contacta a soporte';
			}
		
		}
	}
		

	public function actualizar($id)
	{
		$data['preregistro'] = $this->Welcome_model->fetch($id);
		$this->load->view('templates/navbar');
		$this->load->view('view_editar', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		if($this->input->post('tipo')=='Administrador'){
			$tip=1;
		}else{
			$tip=2;
		}

		$datos = array(
		'nombre' => strtoupper(trim($this->input->post('nombre'))),
		'apaterno' => strtoupper(trim($this->input->post('apaterno'))),
		'amaterno' => strtoupper(trim($this->input->post('amaterno'))),
		'email' =>trim($this->input->post('email')),
		// 'password' =>trim($this->input->post('pwd')),
		'tipo' =>intval($tip)
			);
		$id = $this->input->post('id_preregistro');
		$result = $this->Welcome_model->update($id, $datos);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}
	public function delete($id) {
		$result = $this->Welcome_model->delete($id);
		if ($result == TRUE) {
			redirect('Welcome/listar');
		}else{
			echo 'Contacta a soporte';
		}
	}
	
}