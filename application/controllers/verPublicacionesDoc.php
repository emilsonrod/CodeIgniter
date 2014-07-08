<?php
class VerPublicacionesDoc extends CI_Controller
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
				foreach ($inscrito->result() as $fila) {$CODG = $fila->COD_GRUPO;}

				$nombreGrupo = $this->modelmensaje->obtenerNombreG($CODG);
				foreach ($nombreGrupo->result() as $fila) {$nombG = $fila->NOMBRE_CORTO;}//nombre grupo
				
				$Docente = $this ->modelmensaje->obtenerIdDoc($nombG);
				foreach ($Docente->result() as $fila) {$id_doc = $fila->ID_USUARIO;}//id de su docente

				$nombreDoc =$this ->modelmensaje->obtenerNombre($id_doc);
					foreach ($nombreDoc->result() as $row) {$nomb = $row->NOMBRE;
															$apP = $row->APELLIDOP;
															$apM = $row->APELLIDOM
															;}
					$docente = "".$nomb." ".$apP." ".$apM; //nombre del su docente

			$consulta = $this->modelmensaje->listarMensajesRecibidosG($nombG, $id_doc);

			$data = array('lista' => $consulta);	

			$this->load->view('viewPublicaciones',$data);
			}else{
				echo '<script>window.alert("Tiene que pertenecer a un GRUPO. Puede crear un nuevo grupo o incribirse a uno ya registrado.");location.href="registrarseGrupo";</script>';
			}
		}else{
			redirect('inicio');
		}
	}
}
?>