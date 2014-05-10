<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Integrantes extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelGrupo');
	}	
	function index()
	{	if(isset($this->session->userdata['usuario'])){		
		$this->form_validation->set_rules('integrantes', 'Grupos', 'required');			
		
			
		
		$this->form_validation->set_message('required', 'El campo %s seleccione el grupo para ver los integrantes');
		
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{	
			$data['grupos']=$this->modelGrupo->getGrupos($this->session->userdata('id'));
			$data['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewIntegrantesGrupos',$data);
		}
		else 
		{	
			$this->load->library('table');	
					
			$grupo=$this->input->post('integrantes');
			$data['integrantes']=$this->modelGrupo->getIntegrantes($grupo);
			$data['tareas']=$this->session->userdata('tareas'); 
        	$this->load->view('viewVerIntegrantes',$data);
			
		}
		}else{
			redirect('inicio');
		}
	}
	
		
}
?>