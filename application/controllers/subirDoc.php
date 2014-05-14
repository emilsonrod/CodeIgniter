<?php
class SubirDoc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelSubirDoc');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		if(isset($this->session->userdata['usuario']))
		{
			$data['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewSubirDoc',$data);
		}
		else{
				redirect('inicio');
		}
	}
	public function agregarDoc()
	{
		if(isset($this->session->userdata['usuario']))
		{
			try{
				
				$arrayreempla=array("/","");
				$rutaCarpeta = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
				
				$archivo= str_replace($arrayreempla," ", $_FILES['Filedata']['name']);//monbre real del archivo
				
				$tempArchivo = $_FILES['Filedata']['tmp_name'];//nombre temporal del archivo con el q se almacenara
				$tipo= explode(".", $archivo);
				$extension = end($tipo);
				$nombre= time(). "-" . $archivo;
				$descrip= $_REQUEST['des'];
				$rutaArchivo = str_replace("//", "/", $rutaCarpeta) . $nombre;
				$estado = '1';
				$fecha = date('Y/m/d h:m:s');
				
				$consulta = $this->modelSubirDoc->getCodGrupos($this->session->userdata('id'));
				$id = $this->session->userdata('id');
				foreach($consulta->result() as $row)
				{
					$COD="".$row->COD_GRUPO;	
					$insertar = $this->modelSubirDoc->agregarDoc($id, $COD, $nombre, $descrip, $extension, $estado, $fecha);
					if ($insertar)
					{
						move_uploaded_file($tempArchivo, $rutaArchivo);	
					
						echo '<script>window.alert("El archivo se agrego correctamente");location.href="subirDoc";</script>';
					}else{
						echo '<script>window.alert("El archivo se agrego correctamente");location.href="subirDoc";</script>';	
					}
					break;
				}
				/*----------------*/
				$consultaS = $this->modelSubirDoc->getDocGrupo($this->session->userdata('id'));
					foreach($consultaS->result() as $fila)
					{
						$CODD="".$fila->COD_DOCUMEN;
						$CODG="".$fila->COD_GRUPO;
						$insertarDoc =$this->modelSubirDoc->insertaDocGrupo($CODD, $CODG);
						
					}
			}
			catch (Exception $ex) 
			{
				echo "0";
				echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="subirDoc";</script>';
			}
		}else{
			redirect('inicio');
		}
	}
}

?>