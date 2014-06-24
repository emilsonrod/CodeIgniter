<?php
class Inicio extends CI_Controller
{
    function __construct()
	{
 		parent::__construct();

 		$this->load->library('form_validation');
		$this->load->model('modelLogin');
       // $this->load->library('session');
	}
	public function index()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[20]|min_length[3]');
	    $this->form_validation->set_rules('passw', 'Password', 'trim|required|max_length[20]|min_length[6]');

	    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
	    $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
	    $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');


		
		if(!$this->session->userdata('usuario')){
		  $tareas=$this->modelLogin->getTareasGeneral();
		  $this->session->set_userdata('tareas',$tareas);
		  $this->load->view('home');
        }else{
          $this->load->view('home');
        }
	}
}
?>
