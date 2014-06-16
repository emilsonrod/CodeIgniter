<?php
class CalificarEstudiante extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
        
		$this->load->model('modelUsuario');
	}
	function index()
	{  if(isset($this->session->userdata['usuario'])){
        $listaIds=$this->session->userdata('idEst');
        foreach($listaIds as $id){
            $nota=$this->input->post(''.$id);
            $this->modelUsuario->actalizarNotaEstudiantes($id,$nota);
        }
            $this->vaciarConfig();
        }else{
            redirect('inicio');
        }
        
	}
    function vaciarConfig(){
        
         $this->session->unset_userdata('idEst');
        redirect('notaEstudiante');
    }
}
?>