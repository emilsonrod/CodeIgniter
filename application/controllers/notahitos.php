<?php
class NotaHitos extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
        $this->load->library('form_validation');
		
		$this->load->helper('form');
		$this->load->model('historia_usuario');
		$this->load->model('modelVerGrupo');
	}
	function index()
	{
		   
		$this->form_validation->set_rules('integrantes', 'Grupos', 'required');
		$this->form_validation->set_message('required', 'No selecciono un grupo para calificar sus hitos');
		if(isset($this->session->userdata['usuario'])){
				//$data['tareas']=$this->session->userdata('tareas');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{ 				
                $data['grupos']=$this->modelVerGrupo->getGrupos();
				$numeroGrupos=count($data['grupos']);
                if($numeroGrupos>0){
                    $this->load->view('viewCalificarhito',$data);
				    
                }else{
                    $mensage['error']='Lo sentimos no tiene grupos';
                    $this->load->view('viewNoGrupos',$mensage);
                }
			}
			else
			{			
				
				$grupo=$this->input->post('integrantes');
                $hitos=$this->historia_usuario->getHitosDoc($grupo);
                if($hitos!=false){
                    $data['hitos']=$hitos;
                  
                    $idhitos=array();
                    foreach($hitos as $indice=>$valor){                     
                        $idhitos[]=$indice;
                    }
                    $this->session->set_userdata('idhitos',$idhitos);                   
                    $this->load->view('calificarhitos',$data);
                }else
                {
                    $mensage['error']='El grupo no tiene hitos';
                    $this->load->view('viewNoGrupos',$mensage);
                }
				
			}
		}
	}
}
?>
