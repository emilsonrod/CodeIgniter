<?php

/**
* SUBIR HITO DE LOS ESTUDIANTES.
*/
class SubirHito extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();	
		$this->load->database();
		$this->load->helper('form','url');
		$this->load->model('modelSubirHito');
		$this->load->model( 'modelSubirDoc');
		$this->load->library('form_validation', 'session');
	}
	public function index()
	{
		if (isset($this->session->userdata['usuario'])) 
		{
			$inscrito = $this->modelSubirDoc->inscrito($this->session->userdata('id'));//inscrito en algun grupo
			$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));//cod de grupo
			foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}

			if($inscrito)
			{
				$hayFecha = $this->modelSubirHito->verificarFechaEvento($CODG);
				
				if($hayFecha)
				{
					$this->form_validation->set_rules('txtdes', 'Descripcion', 'trim|required|max_length[150]');
					$this->form_validation->set_rules('userfile', 'File', 'trim|requerid');

					$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		        	

		        	foreach ($hayFecha->result() as $fila) {$fehcaIg = $fila->fecha_evento;}
		        	if ($this->form_validation->run() == FALSE)
					{	
						//foreach ($hayFecha->result() as $fila) {$fehcaIg = $fila->FECHA_EVENTO;}
						$data = array('inscrito' => $inscrito,
							  'fechas' => $hayFecha,
							  'error' =>' ',
							  'tareas'=> $this->session->userdata('tareas'),
							  'lista'=> $this->modelSubirHito->listaEventoHito($CODG, $fehcaIg)
							  );

					$this->load->view('viewSubirHito',$data);
					}
					else{
						try{
							/*-----------------------DATOS DEL DOCUMENTO--------------------------------------------------------------*/
							$nombTemp = $_FILES['userfile']['name'];
							$nombreArchivo= time()."-".$nombTemp;

							$config['file_name'] = $nombreArchivo;
							$config['upload_path'] = './uploadsHito/';
							$config['allowed_types'] = 'doc|docx|pdf';
							$config['max_size'] = '20480';

							$this->load->library('upload', $config);
							/*------------------------------------------INSERTAR EN LA BASE DE DATOS---------------------------------------*/
							if ( ! $this->upload->do_upload())
							{
								$errores = array(
											  'tareas'=> $this->session->userdata('tareas'),
											  'lista'=> $this->modelSubirHito->listaEventoHito($CODG, $fehcaIg),
											'error' => $this->upload->display_errors());
								$this->load->view('viewSubirHito', $errores);
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

								$id_ev = $this->modelSubirHito->getEvento($evento, $CODG);
								foreach($id_ev->result() as $fila)
								{ $IDE = $fila->id_evento;}

								$insertar = $this->modelSubirDoc->agregarDoc($CODG, $IDE, $nombre, $descrip, $fecha);
								if ($insertar)
								{
									echo '<script>window.alert("El archivo se agrego correctamente");location.href="subirHito";</script>';
								}else{
									echo '<script>window.alert("Ocurrio un error al subir el archivo");location.href="subirHito";</script>';	
								}
							}
						}
						catch (Exception $ex) 
						{
							echo '<script>window.alert("Ocurrio un error al subir el documento");location.href="subirHito";</script>';
						}
					}
					
				}else{
					echo '<script>window.alert("Aun no hay fechas definidas  para poder subir Documentos");location.href="listarHito";</script>';
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