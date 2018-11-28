<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ubigeo_model', 'ubigeo');
		$this->load->model('mantenimiento_model', 'mantenimiento');
		$this->load->library('form_validation');
	}

	public function index(){
		
	}

	public function seleccion(){
		
		$sec = $this->input->post('sec');
		$zona=$this->mantenimiento->zona();
		$turno=$this->mantenimiento->turnos();
		$grado=$this->mantenimiento->grado_academico();

		if($sec=="dep"){
			$departamentos=$this->ubigeo->departamentos();			
			foreach($departamentos as $dep) {    	
			 $departamento[] = array(
		                'idDepa' => $dep->idDepa,
		                'departamento' => $dep->departamento                    
		            );
		    }
		 }else{
			$departamento[]="";
		 }
		
		if($sec=="pro"){
			$coddep = $this->input->post('id_dep');
			$provincias=$this->ubigeo->provincia($coddep);
		    foreach($provincias as $pro) {    	
		    	 $provincia[] = array(
		                    'idProv' => $pro->idProv,
		                    'provincia' => $pro->provincia                    
		                );
		         }
	     }else{
			$provincia[] ="";
			}

		if($sec=="dis"){
			$codpro = $this->input->post('id_pro');
			$distritos=$this->ubigeo->distrito($codpro);
	    	foreach($distritos as $dis) {    	
	    	 $distrito[] = array(
	                    'idDist' => $dis->idDist,
	                    'distrito' => $dis->distrito                    
	                );
	         }
	     }else{
	     	$distrito[] ="";
	     }

	    echo json_encode(array("departamento" => $departamento,"provincia"=>$provincia,"distrito"=>$distrito,"grado"=>$grado,"zona"=>$zona,"turno"=>$turno));
	}
	public function escuela(){
		$data['dptos'] = $this->ubigeo->departamentos();
		$this->load->view('content/mantenimiento/escuela',$data);
	}

	/*public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Seleccione un archivo pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Seleccione un archivo para subir.');
            return false;
        }
    }*/
    public function lista_escuela(){
		$scholl = $this->mantenimiento->lista_escuela();
		if ($scholl!=false) {
            $data=[
                "resp"=>"true",
                "datos"=>$scholl,
            ];
         }else{
            $data=[
                "resp"=>"false",
                "msg"=>"No se encontro información en la base de datos",
            ];
         }
         echo json_encode($data);
	}

	/*public function lista_escuela(){    	
        $lista= $this->mantenimiento->lista_escuela();
        $lista=$lista->result_array();    	
    	return $this->outputjson->writeJson($lista);
        
    }*/

	public function registrar_escuela(){
		$json = array();
		$randon=date("Ymd_His");
		//var_dump($randon);EXIT;
		/*$x=$this->input->post('turnos_');
		var_dump($x);exit;*/
		$id_escuela=$this->input->post('id_escuela');
		$status=$this->input->post('status');
		$img=$this->input->post('imgF1');

		if($status!= "edit"){
			$this->form_validation->set_rules('imgF1','ImgF','required');
		}		
		$this->form_validation->set_rules('nom_escuela','Nom_escuela','required');
		$this->form_validation->set_rules('ruc','Ruc','required');
		$this->form_validation->set_rules('direccion','Direccion','required');
		$this->form_validation->set_rules('telefonos','Telefonos','required');
		$this->form_validation->set_rules('correo','Correo','required|valid_email');
		$this->form_validation->set_rules('zona','Zona','required');
		$this->form_validation->set_rules('turnos_','Turnos','required');
		$this->form_validation->set_rules('creacion','Creacion','required');
		$this->form_validation->set_rules('departamento','Departamento','required');
		$this->form_validation->set_rules('provincia','Provincia','required');
		$this->form_validation->set_rules('distrito','Distrito','required');

		if($this->form_validation->run()==FALSE){
			$json = array(
				'msg' => FALSE,
				'1' => form_error('imgF1', '<span class="mt-3 has-error">', '</span>'),
                '2' => form_error('nom_escuela', '<span class="mt-3 has-error">', '</span>'),
                '3'=>form_error('ruc','<span class="mt-3 has-error">','</span>'),
				'4'=>form_error('direccion','<span class="mt-3 has-error">','</span>'),
				'5'=>form_error('telefonos','<span class="mt-3 has-error">','</span>'),
				'6'=>form_error('correo','<span class="mt-3 has-error">','</span>'),
				'7'=>form_error('zona','<span class="mt-3 has-error">','</span>'),
				'8'=>form_error('turnos_','<span class="mt-3 has-error">','</span>'),
				'9'=>form_error('creacion','<span class="mt-3 has-error">','</span>'),
				'10'=>form_error('departamento','<span class="mt-3 has-error">','</span>'),
				'11'=>form_error('provincia','<span class="mt-3 has-error">','</span>'),
				'12'=>form_error('distrito','<span class="mt-3 has-error">','</span>')               
            );
		}else{
			$config=[
			"upload_path"=>"./uploads/colegio",
			"allowed_types"=>"png|jpeg|jpg|ico",
			"file_name"=>$randon,
			"max_size" => 1024,
			"max_width"  => 1024,
			"max_height"  => 768
			];
			if($status!="edit"){

			/* insertando imagen en carpeta */
						
                $this->load->library('upload', $config);                
                
                if($this->upload->do_upload('foto1')){
                	$data=array("upload_data"=>$this->upload->data());
					 $datos=array();
                    
                    $datos[] = array(
				        'nombre' => $this->input->post('nom_escuela'),
				        'ruc' => $this->input->post('ruc'),
				        'direccion' => $this->input->post('direccion'),
				        'telefono' => $this->input->post('telefonos'),
				        'email' => $this->input->post('correo'),
				        'zona' => $this->input->post('zona'),
				        'turnos' => $this->input->post('turnos_'),
				        'creacion' => $this->input->post('creacion'),
				        'departamento' => $this->input->post('departamento'),
				        'provincia' => $this->input->post('provincia'),
				        'distrito' => $this->input->post('distrito'),
				        'foto' => $data['upload_data']['file_name'],
					);
                    $save=$this->mantenimiento->guardar_escuela($datos);
                    if ($save=TRUE) {
                    	$msg=1;
					 	$resp="Se registro Datos de la empresa";						 	
					}else{
						$msg=2;
					 	$resp="Error al Registrar Datos";					 	
					}
					                 
				}else{
					$error=$this->upload->display_errors();
					$msg=3;
					$resp=$error;					
				}
			$json=array(			 		
			 		"msg"=>$msg,
			 		"resp"=>$resp,
			 	);

			/* fin de insert de imagen */
			}else{
				/*modifica*/
				if($img==""){
					$datos[] = array(
						'id' => $id_escuela,
				        'nombre' => $this->input->post('nom_escuela'),
				        'ruc' => $this->input->post('ruc'),
				        'direccion' => $this->input->post('direccion'),
				        'telefono' => $this->input->post('telefonos'),
				        'email' => $this->input->post('correo'),
				        'zona' => $this->input->post('zona'),
				        'turnos' => $this->input->post('turnos_'),
				        'creacion' => $this->input->post('creacion'),
				        'departamento' => $this->input->post('departamento'),
				        'provincia' => $this->input->post('provincia'),
				        'distrito' => $this->input->post('distrito'),				        
					);
					$update=$this->mantenimiento->modifica_school($datos);
                    if ($update=TRUE) {
                    	$msg=1;
					 	$resp="Se Modificó Datos de la empresa";						 	
					}else{
						$msg=2;
					 	$resp="Error al Modificar Datos";					 	
					}
					$json=array(			 		
				 		"msg"=>$msg,
				 		"resp"=>$resp,
				 	);

				}else{
					$this->load->library("upload",$config);
					if($this->upload->do_upload('foto1')){
						$buscarImg = $this->mantenimiento->capturarImagen($id_escuela);
						unlink("./uploads/colegio/".$buscarImg->foto);
						$data=array("upload_data"=>$this->upload->data());
						$datos[] = array(
						'id' => $id_escuela,
				        'nombre' => $this->input->post('nom_escuela'),
				        'ruc' => $this->input->post('ruc'),
				        'direccion' => $this->input->post('direccion'),
				        'telefono' => $this->input->post('telefonos'),
				        'email' => $this->input->post('correo'),
				        'zona' => $this->input->post('zona'),
				        'turnos' => $this->input->post('turnos_'),
				        'creacion' => $this->input->post('creacion'),
				        'departamento' => $this->input->post('departamento'),
				        'provincia' => $this->input->post('provincia'),
				        'distrito' => $this->input->post('distrito'),
				        'foto' => $data['upload_data']['file_name'],
					);
						$result= $this->mantenimiento->modifica_school($datos);
						 if ($update=TRUE) {
                    	$msg=1;
					 	$resp="Se Modificó Datos de la empresa";						 	
						}else{
							$msg=2;
						 	$resp="Error al Modificar Datos";					 	
						}
						$json=array(			 		
					 		"msg"=>$msg,
					 		"resp"=>$resp,
					 	);
					}else{
						$json=array(			 		
					 		"msg"=>3,
					 		"resp"=>$this->upload->display_errors(),
					 	);
					}
					

				}
			}				
		}
		echo json_encode($json);	
	}

	public function delete_school(){
		$id=$this->input->post('id');
		$delete = $this->mantenimiento->delete_school($id);
		if ($delete=true) {
            $data=[
                "resp"=>"true",
                "msg"=>"Se elimino Registro",
            ];
         }else{
            $data=[
                "resp"=>"false",
                "msg"=>"Error al Eliminar Registro",
            ];
         }
         echo json_encode($data);
	}
	public function email(){
		$this->load->view('content/mantenimiento/email');	
	}

	public function select(){
		$this->load->view('content/mantenimiento/configuracion');
	}

	public function lista_especialidad(){
		
		$especialidad = $this->mantenimiento->listaEspec();
		if ($especialidad!=false) {
            $data=[
                "resp"=>"true",
                "especialidad"=>$especialidad,
            ];
         }else{
            $data=[
                "resp"=>"false",
                "msg"=>"No se encontro información en la base de datos",
            ];
         }
         echo json_encode($data);
	
	}
	public function save_especialidad(){
		$nombre=$this->input->post('especialidad');
		$datos = array(
			'nombre' => $nombre,
		);
		$result= $this->mantenimiento->guardar_especialidad($datos);

		if ($result=true) {
		 	$data=[
		 		"resp"=>"true",
		 		"msg"=>"Se registro Especialidad",
		 	];
		 }else{
		 	$data=[
		 		"resp"=>"false",
		 		"msg"=>"Error al Registrar Especialidad",
		 	];
		 }
		 echo json_encode($data);
	}















}
