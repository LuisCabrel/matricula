<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function asistencia(){
		$this->load->view('content/estudiante/control_asistencia');
	}


	
}
