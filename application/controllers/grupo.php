<?php
class Grupo extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modelLogin');
		$this->load->model('modelGrupo');
        $this->load->model('modelUsuario');
		$this->load->library('session');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){
			$this->form_validation->set_rules('nombreCorto','Nombre Corto',         'trim|required|max_length[15]|min_length[3]|is_unique[grupo.nombre_corto]|alpha_numeric');
            $this->form_validation->set_rules('correo','Correo','required|valid_email|is_unique[grupo.correo_grupo]');
			$this->form_validation->set_rules('nombreLargo','nombre Largo', 'required|trim|xss_clean|max_length[50]');
			$this->form_validation->set_rules('contrasenya','Contraseña', 'trim|required|max_length[15]|min_length[6]|alpha_numeric|regex_match[/^.*(?=.{4,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/]');
			$this->form_validation->set_rules('docente', 'docente', 'required');
			
            $this->form_validation->set_rules('integrante','integrante','callback_noPerteneceGrupo');

			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        	$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		    $this->form_validation->set_message('alpha_numeric','Solo puede contener letras y numeros');
            $this->form_validation->set_message('valid_email','El %s debe ser un correo electronico valido');
            $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
		    $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
	       
            $this->form_validation->set_message('noPerteneceGrupo','Usted es %s de una empresa, no puede registrar una nueva');           
      
            $this->form_validation->set_message('regex_match', 'Su contraseña debe tener al menos una letra minuscula una mayuscula y un numero');
        
            $data['docentes']=$this->modelUsuario->getDocentes();
			if ($this->form_validation->run() == FALSE)
			{								
				$this->load->view('viewRegistrarGrupo',$data);
			}
			else
			{
				$form_data = array(
                            'correo'=>set_value('correo'),
					       	'nombreCorto' => set_value('nombreCorto'),
					       	'nombreLargo' => set_value('nombreLargo'),
					       	'contrasenya' => set_value('contrasenya'),
					       	'docente' => set_value('docente'),
							'integrante'=>$this->session->userdata('id'));

				if ($this->modelGrupo->SaveForm($form_data) == TRUE){					   
                    
                    if($this->modelGrupo->inscribirseAGrupo($form_data)==TRUE){
                        $data['exito']='Registro y se inscribio en la nueva empresa';

                        $this->session->unset_userdata('tareas');
                        $this->session->set_userdata('tareas',$this->modelLogin->getTareas($this->session->userdata('id')));
                        
                        $this->load->view('exito',$data);
                    }else{
                        $data['exito']='Registro exitoso de la empresa pero no se pudo inscribir al grupo';
                        $this->load->view('exito',$data);
                    }
				}
				else{
                    $data['error']='No se pudo registra el grupo';
					$this->load->view('error',$data);
				}
			}
		}else{
			redirect('inicio');
		}
	}

    function noPerteneceGrupo(){
        if($this->modelGrupo->inscritoEnUnaEmpresa($this->session->userdata('id'))){
         return false;
        }
        else{return true;}
    }
}
//fin del archivo
