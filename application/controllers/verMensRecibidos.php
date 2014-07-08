<?php
class VerMensRecibidos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelmensaje');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{	
			$nombreDoc =$this ->modelmensaje->obtenerNombre($this->session->userdata('id'));
				foreach ($nombreDoc->result() as $row) {$nomb = $row->NOMBRE;
														$apP = $row->APELLIDOP;
														$apM = $row->APELLIDOM
														;}
				$docente = "".$nomb." ".$apP." ".$apM;

			$consulta = $this->modelmensaje->listarMensajesRecibidos($docente);

			$data = array('lista' => $consulta);	

			$this->load->view('viewMenRecibidos',$data);

		}else{
			redirect('inicio');
		}
	}
	public function eliminarAviso()
	{
		$id = $this->uri->segment(3);
		$borrar = $this->modelmensaje->borrarAviso($id);
					if ($borrar) {
						//echo '<script>window.alert("El archivo elimino correctamente";location.href="listarDoc";)</script>';
						redirect('VerMensajes');
				
					}else {
						echo '<script>window.alert("ERROR")</script>';
						//redirect('listarDoc');
					}
	}
}
?>