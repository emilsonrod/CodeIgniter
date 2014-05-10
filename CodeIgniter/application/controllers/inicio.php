<?php
class Inicio extends CI_Controller
{
	public function index()
	{	
		$this->load->helper('form');//libreria interna
		//acceder a la base de datos recuperar los datos generales
		$tareas=array('docente'=>'Docentes','registrar'=>'Registrarse');
		$data['tareas']=$tareas;
		$this->session->set_userdata('tareas',$tareas);		
		$this->load->view('home',$data);
		/**
		$this->load->view('viewCabecera');
		$this->load->view('viewIzquierda',$data);
		$this->load->view('viewCentral');
		$this->load->view('viewDerecha');
		$this->load->view('viewPiePagina');*/
	}
}
?>