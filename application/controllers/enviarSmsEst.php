<?php

/**
* SUBIR DOCUMETOS POR PARTE DE LOS DOCENTES.
*/
class EnviarSmsEst extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelmensaje');
		$this->load->model('modelSubirDoc');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		if (isset($this->session->userdata['usuario'])) 
		{
			$id =  $this->session->userdata('id');//id del estudiante

			$inscrito = $this->modelSubirDoc->inscrito($this->session->userdata('id'));
			

			if($inscrito)
			{
				$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
				foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}

				$IdDocente = $this->modelSubirDoc->obtenerDocente($CODG);
				foreach ($IdDocente->result() as $row) {$IDU = $row->id_docente;}

				$nombreDoc =$this ->modelmensaje->obtenerNombre($IDU);
				foreach ($nombreDoc->result() as $row) {$nomb = $row->NOMBRE;
														$apP = $row->APELLIDOP;
														$apM = $row->APELLIDOM
														;}
				$docente = "".$nomb." ".$apP." ".$apM;

				$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
				$this->form_validation->set_rules('txtsms', 'Aviso', 'trim|required');

				$this->form_validation->set_message('required', 'El campo %s es obligatorio');

				if ($this->form_validation->run() == FALSE)
				{
					$data = array('docente' =>$docente);
					$this->load->view('viewSmsEst',$data);
				}else{

					$nombre =  $this->input->post('nombre');//nombre docente 
					$mensaje =  $this->input->post('txtsms');//mensaje
					$fecha = date("Y-m-d H:i:s"); 

					$insertar = $this->modelmensaje->registrarMensaje($CODG,$nombre,$mensaje,$fecha);

					if($insertar)
					{
						echo '<script>window.alert("Mensaje Enviado.");location.href="enviarSmsEst";</script>';
					}else{
						echo '<script>window.alert("Error!!!. Vuelva a intentarlo");location.href="enviarSmsEst";</script>';
					}
				}
				
			}else{
				echo '<script>window.alert("Tiene que pertenecer a un GRUPO. Puede crear un nuevo grupo o incribirse a uno ya registrado.");location.href="registrarseGrupo";</script>';
			}
		}else{
			redirect('inicio');
		}
	}
}
?>