<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ControladorDatos extends CI_Controller 
{

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelDatos');

	}
	function index()
	{
		if(isset($this->session->userdata['usuario']))
			{

				$grupo=$this->session->userdata['grupo'];
				$data['nombreCorto']=$grupo;
				$data['nombreLargo']=$this->modelDatos->getNombreLargo($grupo);


				$this->load->view('vistaDatos',$data);

			}
	}


}

?>
