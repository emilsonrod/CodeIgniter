<?php
class NotaEstudiante extends CI_Controller {

	function __construct()
	{
 		parent::__construct();       
		$this->load->library('form_validation');
		$this->load->model('modelGrupo');
	}
	function index()
	{  $this->form_validation->set_rules('grupos','grupos', 'required');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
		
		if(isset($this->session->userdata['usuario'])){
             if ($this->form_validation->run() === FALSE) // validation hasn't been passed
		      {
                $lista=$this->modelGrupo->getGrupos($this->session->userdata('id'));
                $arreglo=array();
                foreach($lista as $value){
                    $arreglo[$value]=$value;
                }
                $data['grupos']=$arreglo;
                $this->load->view('viewNotaEstud',$data);
             }else{
                 $grupo= $this->input->post('grupos');
                 $data['integrantes']=$this->modelGrupo->getIntegrantesNota($grupo);
                 $auxiliar=$data['integrantes'];
                 $guardarIdEstudiantes=array();
                 foreach($auxiliar as $indice=>$valor){                     
                   $guardarIdEstudiantes[]=$indice;
                 }
                 $this->session->set_userdata('idEst',$guardarIdEstudiantes);
                 $this->load->view('viewNotaEstudiantes',$data);
             }
            
		}else{
			redirect('inicio');
		}
	}
}
?>