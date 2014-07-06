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
        $this->load->model('modelUsuario');
		$this->load->library('session');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){

			$this->form_validation->set_rules('u1','Usuarios','callback_repetido');
			$this->form_validation->set_rules('u2','usuario #2','required');
			$this->form_validation->set_rules('p2','usuario #2','required|callback_existeUsuarioA|callback_inscritoGrupoA|callback_repetidoA');
			$this->form_validation->set_rules('u3','usuario #3','required');
			$this->form_validation->set_rules('p3','usuario #3','required|callback_existeUsuarioB|callback_inscritoGrupoB|callback_repetidoB');

			$this->form_validation->set_rules('nombreCorto','Nombre Corto','trim|required|max_length[15]|min_length[3]|is_unique[grupo.nombre_corto]|alpha_numeric');
            $this->form_validation->set_rules('correo','Correo','required|valid_email|is_unique[grupo.correo_grupo]');
			$this->form_validation->set_rules('nombreLargo','nombre Largo', 'required|trim|xss_clean|max_length[50]');
			$this->form_validation->set_rules('contrasenya','Contraseña', 'trim|required|max_length[15]|min_length[6]|alpha_numeric|regex_match[/^.*(?=.{4,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/]');
			$this->form_validation->set_rules('docente', 'docente', 'required');			
           

			$this->form_validation->set_message('repetido','Uno de los %s esta repetido cambie uno de ellos');
            $this->form_validation->set_message('inscritoGrupoA','El %s esta inscrito en otro grupo busque otro integrante');
            $this->form_validation->set_message('inscritoGrupoB','El %s esta inscrito en otro grupo busque otro integrante');
            $this->form_validation->set_message('existeUsuarioA','El %s no existe');
            $this->form_validation->set_message('existeUsuarioB','El %s no existe');

			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('alpha','El campo %s debe estar compuesto solo por letras');
        	$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		    $this->form_validation->set_message('alpha_numeric','Solo puede contener letras y numeros');
            $this->form_validation->set_message('valid_email','El %s debe ser un correo electronico valido');
            $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
		    $this->form_validation->set_message('is_unique', 'El %s ya esta registrado');
	                  
      		
            $this->form_validation->set_message('regex_match', 'Su contraseña debe tener al menos una letra minuscula una mayuscula y un numero');
        	
            $data['docentes']=$this->modelUsuario->getDocentes();
			if ($this->form_validation->run() == FALSE)
			{	
				if($this->modelGrupo->inscritoEnUnaEmpresa($this->session->userdata('id'))){
         			echo '<script>window.alert("Ya esta inscrito en un grupo");location.href="inicio";</script>';
        		}
        		else{
        				$this->load->view('viewRegistrarGrupo',$data);
        			}							
				
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
                    $id2=$this->modelGrupo->getId($_POST['u2'],$_POST['p2']);
                    $id3=$this->modelGrupo->getId($_POST['u3'],$_POST['p3']);
                    $form=array(
                    	'grupo'=>$form_data['nombreCorto'],
                    	'user1'=>$form_data['integrante'],
                    	'user2'=>$id2,
                    	'user3'=>$id3);
                    if($this->modelGrupo->inscribirseAGrupo($form)==TRUE){
                        $data['exito']='Registro y se inscribio en la nueva empresa';
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

    function inscritoGrupoA(){
    	$usuario=$_POST['u2'];
    	$clave=$_POST['p2'];
    	return !$this->modelGrupo->tieneGrupo($usuario,$clave);
    }
    function existeUsuarioA(){
    	$usuario=$_POST['u2'];
    	$clave=$_POST['p2'];
    	return $this->modelGrupo->existe($usuario,$clave);
    }
    function inscritoGrupoB(){
    	$usuario=$_POST['u3'];
    	$clave=$_POST['p3'];
    	return !$this->modelGrupo->tieneGrupo($usuario,$clave);
    }
    function existeUsuarioB(){
    	$usuario=$_POST['u3'];
    	$clave=$_POST['p3'];
    	return $this->modelGrupo->existe($usuario,$clave);
    }
    function repetido(){
    	$usuario1=$this->session->userdata('usuario');
    	$usuario2=$_POST['u2'];
    	$usuario3=$_POST['u3'];

    	return ($usuario1!=$usuario2 && $usuario1!=$usuario3 && $usuario2!=$usuario3);

    }
}
//fin del archivo
