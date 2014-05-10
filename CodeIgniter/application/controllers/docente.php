<?php
class Docente extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('modelGrupo');
	}	
	function index()
	{		
		$this->load->library('table');	
		$data['docentes']=$this->modelGrupo->mostrarDocentes();
		$data['tareas']=$this->session->userdata('tareas'); 
        $this->load->view('viewVerDocentes',$data);
			
	}
}
?>