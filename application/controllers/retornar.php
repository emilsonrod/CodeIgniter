<?php
class Retornar extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('modelLogin');
		$this->load->model('modelGrupo');
	}
	function index()
	{
		
        $data['tareas']=$this->modelLogin->getTareas($this->session->userdata('id'));
        $this->session->unset_userdata('tareas');
        $this->session->set_userdata('tareas',$data['tareas']);
        //$this->load->view('viewGruposCreados',$data);
        
        $this->load->view('viewCabecera');
				$this->load->view('viewIzquierda',$data);
				$this->load->view('viewCentral');
				$this->load->view('viewDerecha');
				$this->load->view('viewPiePagina');

	}
}
?>
