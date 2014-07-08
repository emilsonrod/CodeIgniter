<?php
class VerMensajesEst extends CI_Controller
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
	}

	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{	
			$inscrito = $this->modelSubirDoc->inscrito($this->session->userdata('id'));
			

			if($inscrito)
			{
				$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
				foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}

				$consulta = $this->modelmensaje->listarMensajes($CODG);

				$data = array('lista' => $consulta);	

				$this->load->view('viewAvisosEst',$data);
			}else{
				echo '<script>window.alert("Tiene que pertenecer a un GRUPO. Puede crear un nuevo grupo o incribirse a uno ya registrado.");location.href="registrarseGrupo";</script>';
			}
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
						redirect('VerMensajesEst');
				
					}else {
						echo '<script>window.alert("ERROR")</script>';
						//redirect('listarDoc');
					}
	}
}
?>