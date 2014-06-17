<?php
class CalificarEstudiante extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
        
		$this->load->model('modelUsuario');
	}
	function index()
	{
        $listaIds=$this->session->userdata('idEst');
        foreach($listaIds as $id){
            $nota=$this->input->post(''.$id);
            $this->modelUsuario->actalizarNotaEstudiantes($id,$nota);
        }
        $this->vaciarConfig();
        
        
        /*
        $datos=array();        
        foreach($idsEstudiantes as $id){
            $nota=$this->input->post($id);
            $datos[$id]=$nota;
        }
        foreach($datos as $id=>$nota){
           $this->modelUsuario->actalizarNotaEstudiantes($id,$nota);
        }
        $this->config->set_item('calificarEstudiante','');
        redirect('notaEstudiante');
        */
        
	}
    function vaciarConfig(){
        /* $this->config->set_item('id0',FALSE);
        $this->config->set_item('id1',FALSE);
        $this->config->set_item('id2',FALSE);
        $this->config->set_item('id3',FALSE);
        $this->config->set_item('id4',FALSE);
        */
         $this->session->unset_userdata('idEst');
        redirect('notaEstudiante');
    }
}
?>