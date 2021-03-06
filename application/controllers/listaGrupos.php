<?php
class ListaGrupos extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelGrupo');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){
		$this->form_validation->set_rules('grupos[]','Grupos'.'required');

		$this->form_validation->set_message('required', 'El campo %s al menos elija un grupo');

		  if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		      {
			     $data['grupos']=$this->modelGrupo->getGrupos($this->session->userdata('id'));
			   
                $numeroGrupos=count($data['grupos']);
                if($numeroGrupos>0){
			         $this->load->view('viewDarBajaGrupo',$data);
                }else{
                     $mensage['error']="No tiene grupos para dar de baja";
                     //F $this->load->view('error',$mensage);
                     $this->load->view('viewNoGrupos',$mensage);
                }
		      }
		  else{
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
