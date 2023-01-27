<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
        $this->load->model('Auth_model');
        #$this->load->database();
		
	}
    public function index()
	{
		$this->load->view('view_login');	
	}
    public function ingresar(){
        $user = trim($this->input->post('email'));
        $pwd = trim($this->input->post('pwd'));
        $is_session= $this->Auth_model->validacionUsuario($user,$pwd);
            if(!$is_session){
                echo 'Error al iniciar sesion';
                $this->session->set_flashdata('warning', '  Datos incorrectos');
                
                redirect('auth');
                
            }else{
                $params=array(
                    'id'=> $is_session['id_preregistro'],
                    'nombre'=> $is_session['nombre'].' '.$is_session['apaterno'],
                    'email'=> $is_session['email'],
                    'tipo'=> $is_session['tipo'],
                    'acesso'=> true
                );  
                $this->session->set_userdata($params);
                $this->session->set_flashdata('success', 'Bienvenido '.$params['nombre']);
                if($this->session->userdata['tipo']==1){
                    redirect('Welcome/listar');   
                }else{
                redirect('Welcome');
                }          
            }
        }
    public function cerrarSesion(){
        $datos=array(
            'id','nombre','email','acceso'
        );
        $this->session->unset_userdata($datos);
        $this->session->sess_destroy();
        redirect('Auth');
    }
}