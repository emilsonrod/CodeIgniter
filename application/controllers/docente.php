<?php
class Docente extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('modelUsuario');
	}
	function index()
	{
		$this->load->library('table');
		$data['docentes']=$this->modelUsuario->mostrarDocentes();
		$data['tareas']=$this->session->userdata('tareas');
        $this->load->view('viewVerDocentes',$data);

	}
}
?>
