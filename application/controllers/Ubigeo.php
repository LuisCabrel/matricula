<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubigeo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ubigeo_model', 'ubigeo');
	}

	public function index(){
		
	}

	public function dist(){
		$codpro = $this->input->get('id');
		$this->ubigeo->distritos($codpro);
	}
	public function prov(){
		$coddep = $this->input->get('id');
		$this->ubigeo->provincias($coddep);
	}
	
}
