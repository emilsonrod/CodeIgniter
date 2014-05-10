<?php
class Ingresar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelLogin');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{	
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[20]|min_length[6]');
	    $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[20]|min_length[6]');

	    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
	    $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
	    $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
	    

	    if ($this->form_validation->run() == FALSE)
		{	$data['error']="";
			$this->load->view('viewIngresar',$data);
				
		}
		else
		{
			$nombre = $this->input->post('nombre');
			$passw = $this->input->post('passw');
				
			$logueado = $this->modelLogin->getUser($_POST['nombre'],$_POST['passw']);
			if($logueado)
			{	$username=$_POST['nombre'];
				$id=$this->modelLogin->getId($username);				
				$perfil=$this->modelLogin->getRol($username)->perfil;				
				$data['tareas']=$this->modelLogin->getTareas($perfil);
				
				//$datos=array('nombre'=>$username,'perfil'=>$perfil,'tareas'=>$data['tareas']);
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('usuario',$username);
				$this->session->set_userdata('perfil',$perfil);
				$this->session->set_userdata('tareas',$data['tareas']);
				
				$this->load->view('viewCabecera');
				$this->load->view('viewIzquierda',$data);
				$this->load->view('viewCentral');
				$this->load->view('viewDerecha');
				$this->load->view('viewPiePagina');
			}
			else
			{	$data['error']="Login o Pasword incorrectos intentelo nuevamente";
				$this->load->view('viewIngresar',$data);				
			}					
		}
	
		
	}
	
	public function cerrarSession()
	{	
		$this->session->sess_destroy();		
		redirect('inicio');
	}
}
?>