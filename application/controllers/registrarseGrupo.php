<?php

class RegistrarseGrupo extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelGrupo');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){
		
        $this->form_validation->set_rules('grupo', 'grupo', 'required');
		$this->form_validation->set_rules('contrasenya', 'Contraseña', 'required|trim|xss_clean|min_length[6]|max_length[15]|callback_password_correcto');		
        //$this->form_validation->set_rules('integrante','integrante','callback_check_inscrito');
        
        $this->form_validation->set_message('password_correcto','La %s no es correcta');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');        
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		$this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');		
        //$this->form_validation->set_message('check_inscrito','Usted ya esta inscrito en un grupo, no es posible inscribirse a este grupo ');
		
        $data['lista']=$this->modelGrupo->listaGrupos();
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{	
			if($this->modelGrupo->inscritoEnUnaEmpresa($this->session->userdata('id'))){
         			echo '<script>window.alert("Ya esta inscrito en un grupo-empresa");location.href="inicio";</script>';
        		}
        		else{		
				$this->load->view('viewRegistrarseGrupo',$data);
			}
		}
		else
		{		
                $form_data = array(
					       	'nombreCorto' => set_value('grupo'),
						    'integrante'=>$this->session->userdata('id')
						);
				if ($this->modelGrupo->agregarIntegrante($form_data) == TRUE)
				{
                    $data['exito']='Es integrante del grupo-empresa';
					$this->load->view('exito',$data);   // or whatever logic needs to occur
				}
				else
				{
					$data['error']='No se pudo inscribir en el grupo-empresa';
					$this->load->view('error',$data);
				}
			}
			}else{
				redirect('inicio');
			}
	}
    function password_correcto(){
        return $this->modelGrupo->esCorrecto($this->input->post('grupo'),$this->input->post('contrasenya'));
    }
        
}
?>
