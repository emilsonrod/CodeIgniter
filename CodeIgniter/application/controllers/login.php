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
	public function index($error = '')
	{
		$data['error'] = $error;
		$this->load->view('login',$data);	
		
	}	
	public function loggin()
	{
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('passw', 'passw', 'trim|required|max_length[15]');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');

        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login',$data);
		}
		else
		{
			
			$nombre = $this->input->post('nombre');
			$passw = $this->input->post('passw');
			
			$insert = $this->modelLogin->logginUser($nombre, $passw);
			if($insert)
			{
				redirect('/inicio/','refresh');
			}
			else
			{
				$this->load->view('login');
			}			
		}		
	}
}
?>