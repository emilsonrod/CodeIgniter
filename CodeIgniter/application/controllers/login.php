<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelLogin');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[15]|alpha_numeric');
	    $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[15]|alpha_numeric');

	    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
	    $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
	    $this->form_validation->set_message('alpha_numeric', 'El campo %s debe contener solo letras o numeros');

	    if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
				
		}
		else
		{
			$nombre = $this->input->post('nombre');
			$passw = $this->input->post('passw');
				
			$load = $this->modelLogin->logginUser($nombre, $passw);
			if($load == True)
			{
				$this->load->view('exito usuario');
			}
			else
			{
				$this->load->view('login');				
			}					
		}
		
	}
}
?>