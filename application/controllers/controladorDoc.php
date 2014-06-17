<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ControladorDoc extends CI_Controller 
{

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelDoc');
	}
	function index()
	{
		if(isset($this->session->userdata['usuario']))
			{

				$grupo=$this->session->userdata['grupo'];
				$this->load->library('table');
				$this->load->library('pagination'); //cargamos la libreria de paginacion
				//$grupo=$this->input->post('integrantes');

				$data['documentoA']=$this->modelDoc->getDocumentoA($grupo);
				$data['documentoB']=$this->modelDoc->getDocumentoB($grupo);
				$data['documentoGeneral']=$this->modelDoc->getDocumentoGeneral($grupo);

				$this->load->view('vistaDoc',$data);

			}
	}


}

?>