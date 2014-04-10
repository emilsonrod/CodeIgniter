<?php
class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelRegister');
		$this->load->library('form_validation');
	}
	public function index()
	{
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[30]|alpha');
        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|max_length[20]|alpha');
        $this->form_validation->set_rules('loggin', 'loggin', 'trim|required|max_length[15]|is_unique[usuario.loggin]|alpha_numeric');
        $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('repassw', 'repassw', 'trim|required|max_length[15]|alpha_numeric|matches[passw]|');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|valid_email|is_unique[usuario.correo]');
	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s deve ser un correo electronico valido');
        $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('matches', 'Las contraseñas no son iguales');
        $this->form_validation->set_message('alpha', 'El campo %s debe contener solo letras');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s debe contener solo letras o numeros');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
        $this->form_validation->set_message('is_unique', 'Ese dato ya esta en uso por favor elija otro');
	    

        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$loggin = $this->input->post('loggin');
			$passw = $this->input->post('passw');
			$correo = $this->input->post('correo');
			
			$insert = $this->modelRegister->addUsers($nombre, $apellidos, $loggin, $passw,$correo);
			if($insert)
			{
				$this->load->view('exito');
			}
			else
			{
				$this->load->view('register');
			}
			
		}
	}	
}
?>