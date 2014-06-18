<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Calendar2 extends CI_Controller 
	{

		public function index()
		{
			$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');
			$this->load->view('calendarindex');
		}

	}
?>