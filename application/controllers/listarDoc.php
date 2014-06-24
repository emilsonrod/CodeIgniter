<?php
class ListarDoc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelListarDoc');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{	
			$consulta = $this->modelListarDoc->listarDocDocentes($this->session->userdata('id'));

			$data = array('lista' => $consulta,
						  'tareas'=> $this->session->userdata('tareas')
					);			
			$this->load->view('viewListarDocDocente',$data);
		}else{
			redirect('inicio');
		}
	}
	public function eliminarArchivo()
	{
		$id = $this->uri->segment(3);
		$consulta = $this->modelListarDoc->consultarDoc($id);
		$dir = "uploadsDocente/";
		
			//Borrar archivo del servidor
			foreach($consulta->result() as $row)
				{
					unlink($dir.$row->NOMBRE_DOC);
					$borrar = $this->modelListarDoc->borrarDoc($id);
					if ($borrar) {
						//echo '<script>window.alert("El archivo elimino correctamente";location.href="listarDoc";)</script>';
						redirect('listarDoc');
						break;
				
					}else {
						echo '<script>window.alert("ERROR")</script>';
						break;
						//redirect('listarDoc');
					}
					
				}
	}
}
?>