<?php
class CalificarHito extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
        
		$this->load->model('nodelHito');
	}
	function index()
	{
        $listaIdE=$this->session->userdata('idHito');
        foreach($listaIdE as $ide){
            $calificacion=$this->input->post(''.$ide);
            $this->nodelHito->actualizarNotaHito($ide,$calificacion);
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
         $this->session->unset_userdata('idHito');
        redirect('controladorVerGrupo');
    }
}
?>