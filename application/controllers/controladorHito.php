<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ControladorHito extends CI_Controller 
{

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modelGrupo');
		$this->load->model('historia_usuario');
	}
	function index()
	{
		$this->form_validation->set_rules('grupos','grupos', 'required');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
		if(isset($this->session->userdata['usuario']))
			{
				if($this->modelGrupo->tieneGruposDoc($this->session->userdata('id'))){
				$this->load->library('table');
				$this->load->library('pagination'); //cargamos la libreria de paginacion
				$grupo=$this->session->userdata['grupo'];


				$data['hitos']=$this->historia_usuario->getHitosDoc($grupo);
				    if($data['hitos']!=false){
				    	$auxiliar=$data['hitos'];
                 		$guardarIdHitos=array();
                 		foreach($auxiliar as $indice=>$valor){                     
                   			$guardarIdHitos[]=$indice;
                 		}
                 		$this->session->set_userdata('idHito',$guardarIdHitos);
                 		$this->load->view('calificarhitos',$data);				    	
				    }else{
				    	$data['error']="El grupo ".$grupo." no tiene hitos elija otro grupo";
				    
                 	$this->load->view('viewNogrupos',$data);	
				    }  

                 }else{
                 	$data['error']="No tiene grupos inscritos para calificar sus hitos";
                 	
                 	$this->load->view('viewNogrupos',$data);
                 }
             

			}else{
			redirect('inicio');
		}
	}



}

?>