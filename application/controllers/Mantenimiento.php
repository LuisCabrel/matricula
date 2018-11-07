<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ubigeo_model', 'ubigeo');
	}

	public function index(){
		
	}

	public function escuela(){
		$data['dptos'] = $this->ubigeo->departamentos();
		$this->load->view('content/mantenimiento/escuela',$data);
	}
	
}
