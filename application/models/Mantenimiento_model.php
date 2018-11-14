<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_model extends CI_Model{
	function __construct() {
        parent::__construct();
       
    }

    public function guardar_escuela($datos){
    	$this->db->insert_batch('escuela',$datos);
    	return TRUE;
    }
public function lista_escuela(){
		$this->db->select('a.*,(b.departamento)as nomDepa,(c.provincia)as nomProv,(d.distrito)as nomDist');
		$this->db->from('escuela a');
		$this->db->join('ubdepartamento b','b.idDepa=a.departamento','left');
		$this->db->join('ubprovincia c','c.idProv=a.provincia','left');
		$this->db->join('ubdistrito d','d.idDist=a.distrito','left');
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }

	}
public function delete_school($id){
	 	$this->db->where('id',$id);
        return $this->db->delete('escuela');
	 }
/*public function lista_escuela(){
		$this->db->select('a.*,(b.departamento)as nomDepa,(c.provincia)as nomProv,(d.distrito)as nomDist');
		$this->db->from('escuela a');
		$this->db->join('ubdepartamento b','b.idDepa=a.departamento','left');
		$this->db->join('ubprovincia c','c.idProv=a.provincia','left');
		$this->db->join('ubdistrito d','d.idDist=a.distrito','left');
		$query = $this->db->get();
		return $query;

	}*/
	

	

	

	

}
