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
	}
	public function index()
	{
		$this->load->view('viewSubirDoc');
	}
	public function agregarDoc()
	{
		try{
			
			$arrayreempla=array("/","");
	
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
			$archivo= str_replace($arrayreempla," ", $_FILES['Filedata']['name']);
			
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$type= explode(".", $archivo);
			$extension = end($type);
			$imagen= time(). "-" . $archivo;
			$descrip= $_REQUEST['des'];
			$targetFile = str_replace("//", "/", $targetPath) . $imagen;
			$estado = '1';
			$fecha = date('Y/m/d h:m:s');
			
			$insert = $this->modelSubirDoc->agregarDoc($imagen, $descrip, $extension, $estado, $fecha);
			
			if ($insert)
			{
				move_uploaded_file($tempFile, $targetFile);
				echo '<script>window.alert("El archivo se agrego correctamente");location.href="subirDoc";</script>';
			}else{
					echo "0";
			}
		}
		catch (Exception $ex) 
		{
			echo "0";
			echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="subirDoc";</script>';
		}
	}
}

?>