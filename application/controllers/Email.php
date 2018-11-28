<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function index(){
		$this->load->view('content/mantenimiento/email');
	}

	public function enviar(){
		$config=array(
			'protocol'=>'smtp',
			'smtp_host'=>'smtp.gmail.com',/*smpt de correo*/
			'smtp_port'=>465,
			'smtp_crypto' => 'tls',
			'smtp_user'=>'below.farmacia04@gmail.com',
			'smtp_pass'=>'below.farmacia04@',
			'mailtype'=>'utf-8',
			'wordwrap'=>true
		);
		$this->load->library('email',$config);
		//$this->email->initialize($config);
		$this->email->from('below.farmacia04@gmail.com','admin');/*emailadmin*/
		$this->email->to('programadores.huacho@gmail.com');/*destinatario*/
		$this->email->subject('titulo de mensaje');/*titulo de mensaje*/
		$this->email->message('prueba de mensaje');/*mensaje */
		$this->email->set_newline("\r\n");

		$result=$this->email->send();
		var_dump($result);
		//$this->email->print_debuger();
		echo "enviado";
	}

	
}
