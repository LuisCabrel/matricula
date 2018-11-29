<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_model extends CI_Model{
	function __construct() {
        parent::__construct();
       
    }
    public function turnos(){
    	$this->db->select('*');
    	$this->db->where('status',1);
		$query=$this->db->get('turnos');
		return $query->result();
    }

    public function zona(){
    	$this->db->select('*');
    	$this->db->where('status',1);
		$query=$this->db->get('zona');
		return $query->result();
    }
    public function grado_academico(){
    	$this->db->select('*');
    	$this->db->where('status',1);
		$query=$this->db->get('grado');
		return $query->result();
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
	public function modifica_school($datos){
		$this->db->update_batch('escuela', $datos,'id');
        return true;
	}
	public function capturarImagen($idlogo){
		$this->db->select("foto");
		$this->db->from("escuela");
		$this->db->where("id",$idlogo);
		$query = $this->db->get();
		return $query->row();
	}
	public function listaEspec(){
		$this->db->select("*");
		$this->db->from("especialidad");		
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	public function listaForma(){
		$this->db->select("*");
		$this->db->from("formacion");		
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	public function listaEstado(){
		$this->db->select("*");
		$this->db->from("estado");		
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}
	public function guardar_especialidad($data){
	 	$this->db->insert('especialidad', $data);
        return true;
	 }
	public function guardar_formacion($data){
	 	$this->db->insert('formacion', $data);
        return true;
	 }
	public function guardar_estado($data){
	 	$this->db->insert('estado', $data);
        return true;
	 }
	public function delete_especialidad($id){
	 	$this->db->where('id',$id);
        return $this->db->delete('especialidad');
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
