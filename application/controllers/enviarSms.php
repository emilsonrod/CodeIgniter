<?php

/**
* SUBIR DOCUMETOS POR PARTE DE LOS DOCENTES.
*/
class EnviarSms extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelmensaje');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		if (isset($this->session->userdata['usuario'])) 
		{
			$id =  $this->session->userdata('id');//id del docente
			$gruposDoc = $this->modelmensaje->obtenerGrupos($id);

			if($gruposDoc)
			{
				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('txtsms', 'Aviso', 'trim|required');

				$this->form_validation->set_message('required', 'El campo %s es obligatorio');

				if ($this->form_validation->run() == FALSE)
				{
					$data = array('grupos' =>$gruposDoc);
					$this->load->view('viewSms',$data);
				}else{

					$nombre =  $this->input->post('nombre');//al grupo al que va dirigido 
					$mensaje =  $this->input->post('txtsms');//mensaje
					$fecha = date("Y-m-d H:i:s"); 

					$insertar = $this->modelmensaje->registrarMensaje($id,$nombre,$mensaje,$fecha);
					if($insertar)
					{
						echo '<script>window.alert("Aviso Publicado.");location.href="enviarSms";</script>';
					}else{
						echo '<script>window.alert("Error!!!. Vuelva a intentarlo");location.href="enviarSms";</script>';
					}
				}
			}else{
				echo '<script>window.alert("Aun no tiene Grupos Inscritos.");location.href="inicio";</script>';
			}
		}
		else
		{
			redirect('inicio');
		}
	}
}
?>