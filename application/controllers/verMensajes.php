<?php
class VerMensajes extends CI_Controller
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
			$consulta = $this->modelmensaje->listarMensajes($this->session->userdata('id'));

			$data = array('lista' => $consulta);	

			$this->load->view('viewAvisos',$data);

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