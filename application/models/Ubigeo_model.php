<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ubigeo_model extends CI_Model{
	function __construct() {
        parent::__construct();
       
    }

	function departamentos(){
		$this->db->select('idDepa,departamento');
		$query=$this->db->get('ubdepartamento');

		return $query->result();
	}

	public function provincias($coddep)
	{
		$sql = $this->db->where('idDepa', $coddep)->get('ubprovincia');
		$cadena = "";

		foreach ($sql->result_array() as $reg) {
			$cadena.="<option value='{$reg['idProv']}'>{$reg['provincia']}</option>";
		}

		echo "<option value=''>Seleccione...</option>".$cadena;
	}

	public function distritos($codpro)
	{
		$sql = $this->db->where('idProv', $codpro)->get('ubdistrito');

		$cadena = "";

		foreach ($sql->result_array() as $reg) {
			$cadena.="<option value='{$reg['idDist']}'>{$reg['distrito']}</option>";
		}

		echo '<option value="">Seleccione...</option>'.$cadena;
	}

	public function provincia($coddep){
		$this->db->select('*');
		$this->db->from('ubprovincia');
		$this->db->where('idDepa', $coddep);
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	public function distrito($codpro){
		$this->db->select('*');
		$this->db->from('ubdistrito');
		$this->db->where('idProv', $codpro);
		$query = $this->db->get();
		if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	

}
