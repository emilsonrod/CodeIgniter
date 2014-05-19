<?php
class Inicio extends CI_Controller
{
    function __construct()
	{
 		parent::__construct();

		$this->load->model('modelLogin');
       // $this->load->library('session');
	}
	public function index()
	{
		if(!$this->session->userdata('usuario')){
		  $tareas=$this->modelLogin->getTareas('general');
		  $this->session->set_userdata('tareas',$tareas);
		  $this->load->view('home');
        }else{
          $this->load->view('home');
        }
	}
}
?>
