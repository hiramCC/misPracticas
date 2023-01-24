<?php
    class correo extends CI_Controller{

        public function construct(){
            parent::construct();
        } 

        public function index(){
            $this->email->to('blackzyzz1024@gmail.com');
            $this->email->from('blackzyzz1024@gmail.com','gg');
            $this->email->subject('Prueba');
            $this->email->message('ahuevo si se envio.');
            if($this->email->send()){
                echo "Correo enviado correctamente";
            }else{
                echo "Error al enviar el correo";
            }
        }

    }
?>