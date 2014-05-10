<?php
class Registrar extends CI_Controller
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
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[25]|alpha');
        $this->form_validation->set_rules('apellido', 'apellido', 'trim|required|max_length[80]|alpha');
        $this->form_validation->set_rules('loggin', 'loggin','trim|required|max_length[20]|min_length[6]|is_unique[usuario.loggin]|alpha_numeric');
        $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[15]|min_length[6]|alpha_numeric|regex_match[/^.*(?=.{4,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/]');
        $this->form_validation->set_rules('repassw', 'repassw', 'trim|required|max_length[15]|min_length[6]|alpha_numeric|matches[passw]');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|valid_email|is_unique[usuario.correo]');
	
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El campo %s deve ser un correo electronico valido');
        $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('matches', 'Las contraseñas no son iguales');
        $this->form_validation->set_message('alpha', 'El campo %s debe contener solo letras');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s debe contener solo letras o numeros');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
        $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
        $this->form_validation->set_message('regex_match', 'Su contraseña debe tener al menos una letra minuscula una mayuscula y un numero');
        $this->form_validation->set_message('is_unique', 'Ese dato ya esta en uso por favor elija otro');
	    

        if ($this->form_validation->run() == FALSE)
		{	$data['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewRegistrar',$data);
		}
		else
		{
			$passDocente = $this->input->post('passDocente');
			if(!empty($passDocente)) //si esta vacia la pass docente registra comoestudiante
			{
				$this->form_validation->set_rules('passDocente', 'passDocente', 'callback_docente_check');
				//if ($this->form_validation->run('docente_check') == FALSE)
				if ($passDocente == 'tis2014')
				{
					$nombre = $this->input->post('nombre');
					$apellidos = $this->input->post('apellido');
					$loggin = $this->input->post('loggin');
					$passw = $this->input->post('passw');
					$correo = $this->input->post('correo');
					
					$insert = $this->modelRegister->addUsersDocente($nombre, $apellidos, $loggin, $passw,$correo);
					
					if($insert)
					{
						$this->load->view('exitoDocente/exitoDoc');
					}
					else
					{
						$this->load->view('viewRegistrar');
					}
				}
				else
				{
					$this->load->view('registerFail/fail');
				}
			}
			else
			{
				$nombre = $this->input->post('nombre');
				$apellidos = $this->input->post('apellidos');
				$loggin = $this->input->post('loggin');
				$passw = $this->input->post('passw');
				$correo = $this->input->post('correo');
				
				$insert = $this->modelRegister->addUsersStudent($nombre, $apellidos, $loggin, $passw,$correo);
				if($insert)
				{
					$this->load->view('exito');
				}
				else
				{
					$this->load->view('viewRegistrar');
				}
			}
		}

		function docente_check($str)
		{
			if($str=='tis2014')
			{
				$this->form_validation->set_message('docente_check', 'Esta intentando registrarse como docente y la constraseña no es la correcta');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}	
}
?>