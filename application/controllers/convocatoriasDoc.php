<?php
class ConvocatoriasDoc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelListarDoc');
		$this->load->model('modelSubirDoc');
		

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

				$IdDocente = $this->modelSubirDoc->obtenerDocente($CODG);
				foreach ($IdDocente->result() as $row) {$IDU = $row->id_docente;}

				$consulta = $this->modelListarDoc->listarConvocatoria($IDU);

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

			$this->load->view('viewConvocatoriaDoc',$data);
			}
			else{
				echo '<script>window.alert("Usted no esta inscrito en ningun GRUPO.");location.href="registrarseGrupo";</script>';
			}

		}else{
			redirect('inicio');
		}
	}
}
