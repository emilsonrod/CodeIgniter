<?php
class Inicio extends CI_Controller
{
    function __construct()
	{
 		parent::__construct();

 		$this->load->helper('form');
		$this->load->model('modelLogin');
		$this->load->library('form_validation');
       // $this->load->library('session');
	}
	public function index()
	{
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|max_length[20]|min_length[3]');
	    $this->form_validation->set_rules('passw', 'password', 'trim|max_length[20]|min_length[6]');

	    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
	    $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
	    $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');

	    if ($this->form_validation->run() == FALSE)
		{	if(!$this->session->userdata('usuario')){
			$this->load->view('home');
			}else{
				$perfil=$this->session->userdata['perfil'];

		        	if($perfil == "docente"){
						$this->load->view('viewCabeceraLogginDocente');
						$this->load->view('viewCentral');
						$this->load->view('viewDerecha');
						$this->load->view('viewPiePagina');
					}else{
						$this->load->view('viewCabeceraLoggin');
						$this->load->view('viewCentral');
						$this->load->view('viewDerecha');
						$this->load->view('viewPiePagina');
					}
			}
		}
		else{
			$nombre = $this->input->post('nombre');
			$passw = $this->input->post('passw');

			$logueado = $this->modelLogin->getUser($_POST['nombre'],$_POST['passw']);
			if($logueado){
		
				if(!$this->session->userdata('usuario')){
				  $username=$_POST['nombre'];
					$id=$this->modelLogin->getId($username);
					$perfil=$this->modelLogin->getRol($username)->perfil;
					$data['tareas']=$this->modelLogin->getTareas($perfil);
		            $this->session->unset_userdata('tareas');

					$this->session->set_userdata('id',$id);
					$this->session->set_userdata('usuario',$username);
					$this->session->set_userdata('perfil',$perfil);
					$this->session->set_userdata('tareas',$data['tareas']);
					if($perfil == "docente"){
						$this->load->view('viewCabeceraLogginDocente');
						$this->load->view('viewCentral');
						$this->load->view('viewDerecha');
						$this->load->view('viewPiePagina');
					}else{
						$this->load->view('viewCabeceraLoggin');
						$this->load->view('viewCentral');
						$this->load->view('viewDerecha');
						$this->load->view('viewPiePagina');
					}
		        }else{

		        	$this->load->view('home');	        }
	    	}
	    	else{
	    		echo '<script>window.alert("Ha fallado su nombre de usuario o contraseña, intente de nuevo.");location.href="inicio";</script>';
				$this->load->view('home');
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
