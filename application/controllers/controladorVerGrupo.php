<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ControladorVerGrupo extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelVerGrupo');	
	}
	function index()
	{
		$this->form_validation->set_rules('integrantes', 'Grupos', 'required');
		$this->form_validation->set_message('required', 'No selecciono un grupo para ver sus integrantes');
		if(isset($this->session->userdata['usuario'])){
				//$data['tareas']=$this->session->userdata('tareas');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{ 				
                $data['grupos']=$this->modelVerGrupo->getGrupos();
				$numeroGrupos=count($data['grupos']);
                if($numeroGrupos>0){
                    $this->load->view('integrantesGrupos_view',$data);
				    //$this->load->view('viewIzquierda');
                }else{
                    $mensage['error']='Lo sentimos no tiene grupos';
                    $this->load->view('viewNoGrupos',$mensage);
                }
			}
			else
			{
				$entrar['tareas'] = $this->modelVerGrupo->getVerGrupos();
				/*
				$this->session->unset_userdata('tareas');
				$this->session->set_userdata('tareas',$entrar['tareas']);
				*/
				
				$this->load->library('table');
				$this->load->library('pagination'); //cargamos la libreria de paginacion
				$grupo=$this->input->post('integrantes');


				$this->session->unset_userdata('grupo');
				$this->session->set_userdata('grupo',$grupo);

				
				$this->load->view('verIntegrantes_view',$data);
				
			}
		}
	}

}
?>
