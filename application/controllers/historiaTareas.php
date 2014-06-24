<?php
class HistoriaTareas extends CI_Controller
{
    function __construct()
	{
 		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('historiaUsuario');
	}
	public function index()
	{
          
		if(isset($this->session->userdata['usuario'])){
         $this->form_validation->set_rules('nuevaTarea', 'Nueva Tarea','trim|required|min_length[8]');
         $this->form_validation->set_rules('historias','Historias','required');
         $this->form_validation->set_rules('integrante','Integrante','required');
            
         $this->form_validation->set_message('required', 'El campo %s es obligatorio');
         $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
         
         
            $data['historias']=$this->historiaUsuario->asignarTareasHistorias($this->session->userdata('id'));
            $data['equipo']=$this->historiaUsuario->getEquipo($this->session->userdata('id'));
            if ($this->form_validation->run() == FALSE)
            {	
                $data['error']="";
                
                
                if(count($data['historias'])>0){
                     $data['tareas']=array();
                     
                     $this->load->view('tarea',$data);
                }else{
                    $data['error']="No tiene Historias para asignar nuevas tareas";
                    $this->load->view('error',$data);
                }               
            }else{   
                $tarea=$_POST['nuevaTarea'];
                $histo=$_POST['historias'];
                $id_user=$_POST['integrante'];
                if($this->historiaUsuario->nuevaTareaHistoria($tarea,$histo,$this->session->userdata('id'),$id_user)){
                    $data['tareas']=$this->historiaUsuario->getTareasHistoria($histo,$this->session->userdata('id'));
                    
                    $this->load->view('tarea',$data);
                }else{
                    $data['error']="NO SE PUDO INSERTAR LA NUEVA TAREA, INTENTE  OTRAVEZ POR FAVOR";
                    $this->load->view('error',$data);
                }
            }        
            
        }else{
			redirect('inicio');
		}
	}
}
?>