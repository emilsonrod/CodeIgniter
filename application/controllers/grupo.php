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
        $this->load->model('modelRegGrupo');
		$this->load->library('session');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){
			$this->form_validation->set_rules('nombreCorto','Nombre Corto',         'trim|required|max_length[15]|min_length[3]|is_unique[grupo.nombre_corto]|alpha_numeric');
            $this->form_validation->set_rules('correo','email','required|valid_email|is_unique[grupo.correo_grupo]');
			$this->form_validation->set_rules('nombreLargo','nombre Largo', 'required|trim|xss_clean|max_length[50]');
			$this->form_validation->set_rules('contrasenya','Contraseña', 'required|trim|xss_clean|max_length[15]|min_length[6]');
			$this->form_validation->set_rules('docente', 'docente', 'required');
			$this->form_validation->set_rules('representante','representante','callback_check_representante');
            $this->form_validation->set_rules('integrante','integrante','callback_noPerteneceGrupo');

			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        	$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		    $this->form_validation->set_message('alpha_numeric','Solo puede contener letras y numeros');
            $this->form_validation->set_message('valid_email','El %s debe ser un correo electronico valido');
            $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
		    $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
	        $this->form_validation->set_message('check_representante','Usted ya creo un grupo no es posible crear otro grupo');
            $this->form_validation->set_message('noPerteneceGrupo','Esta inscrito en un grupo, no puede registrar un grupo');

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
				//$data['tareas']=$this->session->userdata('tareas');
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
							'representante'=>$this->session->userdata('id'));

				if ($this->modelGrupo->SaveForm($form_data) == TRUE){
					   $idGrupo=$this->modelGrupo->getIdGrupo($form_data['nombreCorto']);
                    $incribir=array('grupo'=>$idGrupo,'id_user'=>$form_data['representante']);
                    if($this->modelRegGrupo->SaveForm($incribir)==TRUE){
                        $data['exito']='Registro y se inscribio al grupo creado';
                        $this->load->view('exito',$data);
                    }else{
                        $data['exito']='Registro exitoso del grupo pero no se pudo inscribir al grupo';
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
    function check_representante(){
        if($this->modelGrupo->creoGrupo($this->session->userdata('id'))){

         return false;
        }
        else{return true;}
    }
    function noPerteneceGrupo(){
        $this->load->model('modelRegGrupo');
        if($this->modelRegGrupo->inscrito($this->session->userdata('id'))){
         return false;
        }
        else{return true;}
    }
}
//fin del archivo
