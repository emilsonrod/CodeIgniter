<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Integrantes extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('grupoM');
	}
	function index()
	{
		$this->form_validation->set_rules('integrantes', 'Grupos', 'required');
		$this->form_validation->set_message('required', 'No selecciono un grupo para ver sus integrantes');
		if(isset($this->session->userdata['usuario'])){
				//$data['tareas']=$this->session->userdata('tareas');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{ 				
                $data['grupos']=$this->grupoM->getGrupos();
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
				$this->load->library('table');
				$this->load->library('pagination'); //cargamos la libreria de paginacion
				$grupo=$this->input->post('integrantes');
				$data['integrantes']=$this->grupoM->getIntegrantes($grupo);
				$data['nombreCorto']=$grupo;
				$data['nombreLargo']=$this->grupoM->getNombreLargo($grupo);
				//$grupo=$this->input->post('documentos');
				$data['documentos']=$this->grupoM->getDocumentosGrupo($grupo);
        		//$data= $this->grupoM->getNombreLargo($grupo);
        		//$this->load->view('verIntegrantes_view',$nombreL);
        		$this->load->view('verIntegrantes_view',$data);

			}
		}
	}

}
?>
