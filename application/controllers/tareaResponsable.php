<?php
class TareaResponsable extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('historia_usuario');
		
	}
	function index()
	{
		   
		if(isset($this->session->userdata['usuario'])){
			if($this->historia_usuario->inscritoGrupo($this->session->userdata('id'))){

            	$historias=$this->historia_usuario->getResponsables($this->session->userdata('id'));
            
           		 if($historias!=false){
                	$data['historias']=$historias;
                	$this->load->view('responsables',$data);
            	}else{
                	$data['error']="No tiene historias que mostrar";
                    $this->load->view('error',$data);
            	}
            }else{
            	echo '<script>window.alert("No esta inscrito en un grupo inscribase o registre nuevo grupo");location.href="registrarseGrupo";</script>';
            }	
        }else{
			redirect('inicio');
		}
	}
}
?>
