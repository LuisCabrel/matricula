<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_model extends CI_Model{
	function __construct() {
        parent::__construct();
       
    }

    public function guardar_escuela($data){
    	$this->db->insert('escuela',$data);
    	return TRUE;
    }

	

	

	

	

}
