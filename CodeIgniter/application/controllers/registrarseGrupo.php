<?php

class RegistrarseGrupo extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelRegGrupo');
	}	
	function index()
	{	if(isset($this->session->userdata['usuario'])){		
		$this->form_validation->set_rules('grupo', 'Grupo', '');			
		$this->form_validation->set_rules('contrasenya', 'Contraseña', 'required|trim|xss_clean|min_length[6]|max_length[15]|md5');
			
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		$this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
		
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$datos=$this->modelRegGrupo->getGrupos();
			$lista=array();
			foreach ($datos->result_array() as $row)
				{
					$lista[$row['cod_grupo']]=$row['nombre_corto'];
   					 
				}		    
			$data['lista']=$lista;
			$data['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewRegistrarseGrupo',$data);
		}
		else 
		{
		 	
			
			$form_data = array(
					       	'grupo' => set_value('grupo'),
					       	'contrasenya' => set_value('contrasenya'),
						    'id_user'=>$this->session->userdata('id')
						);
					
			
		    
				if ($this->modelRegGrupo->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('regGrupoC/success');   // or whatever logic needs to occur
				}
				else
				{
					echo 'Limite  de integrantes por grupo superado inscribase en otro grupo vacio';
			
				}
			
			}
			}else{
				redirect('inicio');
			}
	}
	function success()
	{
			echo 'Bienvenido al grupo';
	}
}
?>