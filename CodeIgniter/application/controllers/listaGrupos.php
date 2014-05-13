<?php 
class ListaGrupos extends CI_Controller {
               
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
	{	if(isset($this->session->userdata['usuario']))
		{
			$this->form_validation->set_rules('grupos[]','Grupos'.'required');
			
			$this->form_validation->set_message('required', 'El campo %s al menos elija un grupo');
			
			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{	
				$data['grupos']=$this->modelGrupo->getGrupos($this->session->userdata('id'));
				$data['tareas']=$this->session->userdata('tareas');
				$this->load->view('viewListaGrupos',$data);
			
			}
			else 
			{			
				foreach ($this->input->post('grupos')as $nombreGrupo) {
		  		
				  if($this->modelGrupo->darBaja($nombreGrupo)==false){
				  		echo 'Ocurrio un error';				 
				  }
			  } redirect('listaGrupos');
				
			}	
		}else{
				redirect('inicio');
			}		
		
		
		}
	

	
}
?>