<?php

/**
* SUBIR DOCUMETOS POR PARTE DE LOS DOCENTES.
*/
class SubirDocDocente extends CI_Controller
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
		if (isset($this->session->userdata['usuario'])) 
		{
			$this->form_validation->set_rules('txtdes', 'Descripcion', 'trim|required');
			$this->form_validation->set_rules('userfile', 'File', 'trim|requerid');
			if (empty($_FILES['userfile']['name']))
			{
			    $this->form_validation->set_rules('userfile', 'archivo', 'required');
			}

			$this->form_validation->set_message('required', 'El campo %s es obligatorio');

		    if ($this->form_validation->run() == FALSE)
			{
				$data = array('tareas'=> $this->session->userdata('tareas'),
								'error' => '' );
				$this->load->view('viewSubirDocDocente',$data);
			}else{
				try
			{
				/*-----------------------DATOS DEL DOCUMENTO--------------------------------------------------------------*/
				$nombTemp = $_FILES['userfile']['name'];
				$nombreArchivo= time()."-".$nombTemp;

				$config['file_name'] = $nombreArchivo;
				$config['upload_path'] = './uploadsDocente/';
				$config['allowed_types'] = 'pdf|xls|xlsx';
				$config['max_size'] = '10240';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					$tipo_archivo = $_FILES['userfile']['type']; 
					if (!(strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "xls") || strpos($tipo_archivo, "xlxs") ) )
					 {
					 	$errores = "El tipo de archivo no es correcto.";
					 }
					else{
						if ($_FILES['userfile']['size'] > 10485760)
						{
							$errores = "EL tamanio permitido es 10Mb.";
						}
					}
					
					$error = array('error' => $errores,
									'tareas'=> $this->session->userdata('tareas'));
					$this->load->view('viewSubirDocDocente', $error);
				}
				else
				{
					$file_data = $this->upload->data();
					$id = $this->session->userdata('id');
					$nombre = $file_data['file_name'];
					$descrip =  $this->input->post('txtdes');
					$fecha =  date('Y/m/d');

					$insertar = $this->modelSubirDoc->agregarDocDoc($id, $nombre, $descrip, $fecha);
							if ($insertar)
							{
								echo '<script>window.alert("El archivo se agrego correctamente");location.href="SubirDocDocente";</script>';
							}else{
								echo '<script>window.alert("Ocurrio un error al subir el archivo");location.href="SubirDocDocente";</script>';	
							}
						
				}
			}
			catch (Exception $ex) 
			{
				echo "0";
				echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="../SubirDocDocente";</script>';
			}
			}
		}
		else
		{
			redirect('inicio');
		}
	}
}
?>