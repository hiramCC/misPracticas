<?php
    class Email extends CI_Controller{

        public function construct(){
            parent::construct();
        } 

        public function index(){
            $this->email->to('josetorreah@gmail.com');
            $this->email->from('josetorreah@gmail.com','Residencia Email');
            $this->email->subject('Prueba de correo');
            $this->email->message('Prueba envio de correo.');
            if($this->email->send()){
                echo "Correo enviado correctamente";
            }else{
                echo "Error al enviar el correo";
            }
        }

    }
?>