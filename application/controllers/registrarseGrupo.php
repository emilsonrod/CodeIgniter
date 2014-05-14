<?php

class RegistrarseGrupo extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelRegGrupo');
	}
	function index()
	{	if(isset($this->session->userdata['usuario'])){
		$this->form_validation->set_rules('grupo', 'grupo', '');
		$this->form_validation->set_rules('contrasenya', 'Contraseña', 'required|trim|xss_clean|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('confirmacionPassword','confirmacionPassword','callback_check_password');
        $this->form_validation->set_rules('integrante','integrante','callback_check_inscrito');


		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		$this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
		$this->form_validation->set_message('check_password','Contraseña no es correcta');
        $this->form_validation->set_message('check_inscrito','Usted ya esta inscrito en un grupo, no es posible inscribirse a este grupo ');


		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$datos=$this->modelRegGrupo->getGrupos();
			$lista=array();
			foreach ($datos->result_array() as $row)
				{
					$lista[$row['cod_grupo']]=$row['nombre_corto'];

				}
			$data['lista']=$lista;
			$data['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewRegistrarseGrupo',$data);
		}
		else
		{


			$form_data = array(
					       	'grupo' => set_value('grupo'),
					       	'contrasenya' => set_value('contrasenya'),
						    'id_user'=>$this->session->userdata('id')
						);



				if ($this->modelRegGrupo->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
                    $data['exito']='Es integrante del grupo';
					$this->load->view('exito',$data);   // or whatever logic needs to occur
				}
				else
				{
					$data['error']='No se pudo inscribir al grupo';
					$this->load->view('error',$data);

				}

			}
			}else{
				redirect('inicio');
			}
	}

    function check_password(){
        $pass=$this->input->post('contrasenya');
        $nombre_grupo=$this->modelRegGrupo->getNombreGrupo($this->input->post('grupo'));
        if($this->modelRegGrupo->correctoPass($nombre_grupo,$pass)){
         return true;
        }
        else{return false;}
    }
    function check_inscrito(){
         if($this->modelRegGrupo->inscrito($this->session->userdata('id'))){
         return false;
        }
        else{return true;}
    }

}
?>
