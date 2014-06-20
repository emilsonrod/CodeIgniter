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
	}

	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{	
			$consulta = $this->modelListarDoc->listarConvocatoria();

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
		}else{
			redirect('inicio');
		}
	}
}
