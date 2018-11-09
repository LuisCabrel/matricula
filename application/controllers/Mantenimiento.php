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

	public function escuela(){
		$data['dptos'] = $this->ubigeo->departamentos();
		$this->load->view('content/mantenimiento/escuela',$data);
	}

	public function file_check($str){
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
    }


	public function registrar_escuela(){
		$json = array();
		// $img = array();
		//$this->form_validation->set_rules('foto','Foto','callback_file_check');
		$this->form_validation->set_rules('imgF','ImgF','required');
		$this->form_validation->set_rules('nom_escuela','Nom_escuela','required');
		$this->form_validation->set_rules('ruc','Ruc','required');
		$this->form_validation->set_rules('direccion','Direccion','required');
		$this->form_validation->set_rules('telefonos','Telefonos','required');
		$this->form_validation->set_rules('correo','Correo','required');
		$this->form_validation->set_rules('zona','Zona','required');
		$this->form_validation->set_rules('turnos','Turnos','required');
		$this->form_validation->set_rules('creacion','Creacion','required');
		$this->form_validation->set_rules('departamento','Departamento','required');
		$this->form_validation->set_rules('provincia','Provincia','required');
		$this->form_validation->set_rules('distrito','Distrito','required');

		if($this->form_validation->run()==FALSE){
			$json = array(
				'msg' => FALSE,
				'1' => form_error('imgF', '<span class="mt-3 has-error">', '</span>'),
                '2' => form_error('nom_escuela', '<span class="mt-3 has-error">', '</span>'),
                '3'=>form_error('ruc','<span class="mt-3 has-error">','</span>'),
				'4'=>form_error('direccion','<span class="mt-3 has-error">','</span>'),
				'5'=>form_error('telefonos','<span class="mt-3 has-error">','</span>'),
				'6'=>form_error('correo','<span class="mt-3 has-error">','</span>'),
				'7'=>form_error('zona','<span class="mt-3 has-error">','</span>'),
				'8'=>form_error('turnos','<span class="mt-3 has-error">','</span>'),
				'9'=>form_error('creacion','<span class="mt-3 has-error">','</span>'),
				'10'=>form_error('departamento','<span class="mt-3 has-error">','</span>'),
				'11'=>form_error('provincia','<span class="mt-3 has-error">','</span>'),
				'12'=>form_error('distrito','<span class="mt-3 has-error">','</span>')               
            );
		}else{
			/* insertando imagen en carpeta */
			$this->input->post('foto');
			//upload configuration
                $config['upload_path']   = './uploads/colegio/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = 1024;
                $config['max_width']      = 5418;
                $config['max_height']      = 3048;
                $this->load->library('upload', $config);
                
                //upload configuration
                $config['upload_path']   = './uploads/colegio/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = 1024;
                $this->load->library('upload', $config);
                //upload file to directory
                if($this->upload->do_upload('foto')){
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    
                    /*
                     *insert file information into the database
                     *.......
                     */
                    
                    $img = TRUE;
                }else{
                    $img =$this->input->post('foto');;
                }
            /* fin insertando imagen en carpeta */    
            if($img==TRUE){
	            	/*$data = array(
			        'nombre' => $this->input->post('nom_escuela'),
			        'ruc' => $this->input->post('ruc'),
			        'direccion' => $this->input->post('direccion'),
			        'telefono' => $this->input->post('telefonos'),
			        'email' => $this->input->post('correo'),
			        'zonas' => $this->input->post('zona'),
			        'turno' => $this->input->post('turnos'),
			        'creacion' => $this->input->post('creacion'),
			        'departamento' => $this->input->post('departamento'),
			        'provincia' => $this->input->post('provincia'),
			        'distrito' => $this->input->post('distrito'),
			        //'foto' => $this->input->post('nombre');,
				);
				$save=$this->mantenimiento_model->guardar_escuela($data);
				if($save==TRUE){
					$json = array(
					'msg' => TRUE,
					);
				}else{
					$json = array(
					'msg' => "Error al Guardar Datos",
					);
				}*//*borra est3e json*/
				$json = array(
					'msg' => "insertado Imagen",
					);
            }else{
            	$json = array(
					'msg' => $img,
					);
            }
			
			
		}
		echo json_encode($json);
	}
	
}
