<?php
class Volver extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelVerGrupo');
		$this->load->library('form_validation');
		//$this->load->library('session');
	}
	public function index()
	{

			$dato['tarea']=$this->session->userdata['tareas'];


				$this->load->view('viewCabecera');
				$this->load->view('viewIzquierda',$dato);
				$this->load->view('viewCentral');
				$this->load->view('viewDerecha');
				$this->load->view('viewPiePagina');

	}
}