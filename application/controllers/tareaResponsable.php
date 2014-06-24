<?php
class TareaResponsable extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('historiaUsuario');
		
	}
	function index()
	{
		   
		if(isset($this->session->userdata['usuario'])){
            $historias=$this->historiaUsuario->getResponsables($this->session->userdata('id'));
            
            if($historias!=false){
                $data['historias']=$historias;
                $this->load->view('responsables',$data);
            }else{
                $data['error']="No tiene historias q mostrar";
                    $this->load->view('error',$data);
            }
        }else{
			redirect('inicio');
		}
	}
}
?>
