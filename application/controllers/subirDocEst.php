<?php

/**
* SUBIR DOCUMETOS POR PARTE DE LOS ESTUDIANTES.
*/
class SubirDocEst extends CI_Controller
{
	function __construct()
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
			$inscrito = $this->modelSubirDoc->inscrito($this->session->userdata('id'));
			

			if($inscrito)
			{
				$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
				foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}

				$IdDocente = $this->modelSubirDoc->obtenerDocente($CODG);
				foreach ($IdDocente->result() as $row) {$IDU = $row->id_docente;}
				$hayFecha = $this->modelSubirDoc->verificarEventoDoc($IDU);

				if($hayFecha)
				{
					$this->form_validation->set_rules('txtdes', 'Descripcion', 'trim|required');
					$this->form_validation->set_rules('userfile', 'File', 'trim|requerid');
					if (empty($_FILES['userfile']['name']))
					{
					    $this->form_validation->set_rules('userfile', 'archivo', 'required');
					}

					$this->form_validation->set_message('required', 'El campo %s es obligatorio');

		        	foreach ($hayFecha->result() as $fila) {$fehcaIg = $fila->FECHA_EVENTO;}
		        	if ($this->form_validation->run() == FALSE)
					{	
						//foreach ($hayFecha->result() as $fila) {$fehcaIg = $fila->FECHA_EVENTO;}
						$data = array('inscrito' =>$inscrito,
							  'fechas' => $hayFecha,
							  'error' =>' ',
							  'tareas'=> $this->session->userdata('tareas'),
							  'lista'=> $this->modelSubirDoc->listaEventos($IDU, $fehcaIg)
							  );

						$this->load->view('viewSubirDoc',$data);
					}
					else
					{
						try{
							/*-----------------------DATOS DEL DOCUMENTO--------------------------------------------------------------*/
							$nombTemp = $_FILES['userfile']['name'];
							$nombreArchivo= time()."-".$nombTemp;

							$config['file_name'] = $nombreArchivo;
							$config['upload_path'] = './uploadsDocumento/';
							$config['allowed_types'] = 'doc|docx|pdf';
							$config['max_size'] = '20480';

							$this->load->library('upload', $config);
							/*------------------------------------------INSERTAR EN LA BASE DE DATOS---------------------------------------*/
							if ( ! $this->upload->do_upload())
							{
								$tipo_archivo = $_FILES['userfile']['type']; 
								if (!(strpos($tipo_archivo, "pdf")  ) )
								 {
								 	$errores = "El tipo de archivo no es correcto. El archivo tiene q ser de tipo PDF.";
								 }
								else{
									if ($_FILES['userfile']['size'] > 10485760)
									{
										$errores = "EL tamanio permitido es 10Mb.";
									}
								}
								$error = array('error' => $errores,
											   'tareas'=> $this->session->userdata('tareas'),
											    'lista'=> $this->modelSubirDoc->listaEventos($IDU, $fehcaIg));
								$this->load->view('viewSubirDoc', $error);
								
							}
							else
							{
								$file_data = $this->upload->data();
								$id = $this->session->userdata('id');
								$nombre = $file_data['file_name'];
								$descrip =  $this->input->post('txtdes');
								$evento = $this->input->post('fecha');
								$fecha =  date('Y/m/d');

								$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
								foreach ($codGrupo->result() as $fila) 
									{$CODG = $fila->cod_grupo;}

								$docente = $this->modelSubirDoc->obtenerDocente($CODG);
								foreach ($docente->result() as $fila) 
									{$IDU = $fila->id_docente;}

								$id_ev = $this->modelSubirDoc->getEvento($evento, $IDU);
								foreach($id_ev->result() as $fila)
								{ $IDE = $fila->id_evento;}

								$insertar = $this->modelSubirDoc->agregarDoc($CODG, $IDE, $nombre, $descrip, $fecha);
								if ($insertar)
								{
									echo '<script>window.alert("El archivo se agrego correctamente");location.href="subirDocEst";</script>';
								}else{
									echo '<script>window.alert("Ocurrio un error al subir el archivo");location.href="subirDocEst";</script>';	
								}
							}
						}
						catch (Exception $ex) 
						{
							echo "0";
							echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="subirDocEst";</script>';
					    }
					}	
				}else{
					echo '<script>window.alert("Aun no hay fechas definidas  para poder subir Documentos");location.href="listarDocEst";</script>';
				}
			}
			else{
				echo '<script>window.alert("Tieme que pertenecer a un grupo para poder subir documentos. Puede crear un nuevo grupo o incribirse a uno ya registrado.");location.href="registrarseGrupo";</script>';
			}
		}
		else
		{
			redirect('inicio');
		}
	}
}
?>