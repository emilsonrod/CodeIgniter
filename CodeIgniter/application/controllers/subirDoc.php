<?php
class subirDoc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$this->load->helper('form');//libreria interna
		$this->load->view('crearDocumento');//lamada a libreria
	}
}
?>