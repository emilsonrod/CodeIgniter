<?php
class ListarDocEst extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelListarDoc');
		$this->load->model('modelSubirDoc');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{	
			$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
			foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}
			$consulta = $this->modelListarDoc->listarDocumentosEst($CODG);

			$data = array('lista' => $consulta,
						  'tareas'=> $this->session->userdata('tareas')
					);
			/*$consulta = $this->modelSubirDoc->getCodGrupos($this->session->userdata('id'));
			$docente = $this->modelSubirDoc->rolUsuario($this->session->userdata('id'));
			$hayFecha = $this->modelSubirDoc->verificarFecha();

			if($docente)
			{
				$data = array('docente' => $docente,
							  'lista' => $this->modelSubirDoc->getDocumentosDoc($this->session->userdata('id')),
							  'tareas'=> $this->session->userdata('tareas')
					);
			}else{
				foreach($consulta->result() as $row)
				{
					$COD="".$row->COD_GRUPO;	
					$data = array('docente' => $docente,
								  'fechas' => $hayFecha,
							      'lista' => $this->modelSubirDoc->getDocumentosGrupoFecha($COD),
								  'tareas'=> $this->session->userdata('tareas')
					);
					break;
				}
			}*/
			$this->load->view('viewListarDoc',$data);
		}else{
			redirect('inicio');
		}
	}
	public function eliminarArchivo()
	{
		$id = $this->uri->segment(3);
		$consulta = $this->modelListarDoc->consultarDocEst($id);
		$dir = "uploadsDocumento/";
		
			//Borrar archivo del servidor
			foreach($consulta->result() as $row)
				{
					unlink($dir.$row->NOMBRE_ENTREGA);
					$borrar = $this->modelListarDoc->borrarDocEst($id);
					if ($borrar) {
						//echo '<script>window.alert("El archivo elimino correctamente";location.href="listarDoc";)</script>';
						redirect('listarDocEst');
						break;
				
					}else {
						echo '<script>window.alert("ERROR")</script>';
						break;
						//redirect('listarDoc');
					}
					
				}
	}
}
