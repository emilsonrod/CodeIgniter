<?php 
class Grupo extends CI_Controller {
             
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelGrupo');
		$this->load->library('session');
	}	
	function index()
	{	if(isset($this->session->userdata['usuario'])){
			$this->form_validation->set_rules('nombreCorto', 'Nombre Corto',         'trim|alpha|required|max_length[15]|min_length[3]|is_unique[grupo.nombre_corto]');
			$this->form_validation->set_rules('nombreLargo', 'Nombre Largo', 'required|trim|xss_clean|max_length[50]');			
			$this->form_validation->set_rules('contrasenya', 'Contraseña', 'required|trim|xss_clean|max_length[15]|min_length[6]');			
			$this->form_validation->set_rules('docente', 'Docente', 'required');
			
		
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        	$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		
        	$this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');	
		    $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
	
			if ($this->form_validation->run() == FALSE)
			{	
				$docentes=$this->modelGrupo->getDocentes();
			
				$arreglo =array();
				$arreglo['']="Elige tu Docente";
             	foreach ($docentes->result_array() as $row)
					{
						$arreglo[$row['id_usuario']]=$row['nombre'].' '.$row['apellidos'];
   					 
					}
            
				$data['docentes']=$arreglo;
				$data['tareas']=$this->session->userdata('tareas');
				$this->load->view('viewRegistrarGrupo',$data);
			}
			else 				
			{	
				
					
					$form_data = array(
					       	'nombreCorto' => set_value('nombreCorto'),
					       	'nombreLargo' => set_value('nombreLargo'),
					       	'contrasenya' => set_value('contrasenya'),
					       	'docente' => set_value('docente'),
							'representante'=>$this->session->userdata('id'));			
		
				if ($this->modelGrupo->SaveForm($form_data) == TRUE){
					redirect('grupo/success');
				}
				else{
					echo 'A ocurrido un error intentelo nuevamente';			
				}
			}
		}else{
			redirect('inicio');
		}
	}
	function success()
	{
			echo 'Exitoso registro grupo';
	}	
}
//fin del archivo