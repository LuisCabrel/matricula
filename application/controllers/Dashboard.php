<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		$this->load->view('content/dashboard');
	}

	public function matricula(){
		$this->load->view('content/gestion/control_matricula');
	}
	public function asistencia(){
		$this->load->view('content/gestion/asistencia');
	}
	public function control_notas(){
		$this->load->view('content/gestion/control_notas');
	}
	public function asignar_cursos(){
		$this->load->view('content/gestion/asignar_cursos');
	}
}
