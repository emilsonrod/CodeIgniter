<?php
class Inicio extends CI_Controller
{
	public function index()
	{
		$this->load->helper('form');//libreria interna
		$this->load->view('home');//lamada a libreria
	}
}
?>