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
	public function index($error = '')
	{
		$data['error'] = $error;
		$this->load->view('register',$data);
	}
	public function addUser()
	{

		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('loggin', 'loggin', 'trim|required|max_length[15]|is_unique[usuario.LOGGIN]');
        $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|valid_email|max_length[15]|is_unique[usuario.CORREO]');
	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s deve ser un correo electronico valido');
        $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');

        if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$loggin = $this->input->post('loggin');
			$passw = $this->input->post('passw');
			$correo = $this->input->post('correo');
			
			$insert = $this->modelRegister->addUser($nombre, $apellidos, $loggin, $passw,$correo);
			if($insert)
			{
				redirect('/register/','refresh');
			}
			else
			{
				$this->new_video();
			}
			
		}
	}	
}
?>