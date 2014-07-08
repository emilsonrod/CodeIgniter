<?php
class HistoriaTareas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('historia_usuario');
    }
    public function index()
    {
          
        if(isset($this->session->userdata['usuario'])){
         $this->form_validation->set_rules('nuevaTarea', 'Nueva Tarea','trim|required|min_length[8]');
         $this->form_validation->set_rules('historias','Historias','required');
         $this->form_validation->set_rules('integrante','Integrante','required');
            
         $this->form_validation->set_message('required', 'El campo %s es obligatorio');
         $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
         
         if($this->historia_usuario->inscritoGrupo($this->session->userdata('id'))){
           $data['hitos']=$this->historia_usuario->getHitos($this->session->userdata('id'));
           $data['equipo']=$this->historia_usuario->getEquipo($this->session->userdata('id'));
                if ($this->form_validation->run() == FALSE)
                {   
                    $data['error']="";
                
                
                    
                        if(count($data['hitos'])>0){
                            $data['tareas']=array();                     
                            $this->load->view('tarea',$data);
                        }else{
                            $data['error']="No tiene Hitos para asignar nuevas historias";
                    
                            $this->load->view('error',$data);
                        }
                                   
                }else{   
                    $historia=ucfirst(strtolower($_POST['nuevaTarea']));
                    $hito=$_POST['historias'];
                    $responsable=$_POST['integrante'];

                    switch ($this->historia_usuario->nuevaHistoria($historia,$hito,$this->session->userdata('id'),$responsable)) {
                        case 0:
                            echo '<script>window.alert("Ocurrio algo inesperado No se guardo la nueva historia de usuario intentelo otra vez");location.href="historiaTareas";</script>';
                            break;
                        case 1:
                            echo '<script>window.alert("Esta repitiendo responsable a esta historia de usuario, elija otro responsable por favor");location.href="historiaTareas";</script>';
                            break;
                        case 2:
                            $data['tareas']=$this->historia_usuario->getTareasHistoria($hito,$this->session->userdata('id'));                    
                            $this->load->view('tarea',$data);
                            break;
                    }

                    /*F
                    if($this->historia_usuario->nuevaHistoria($historia,$hito,$this->session->userdata('id'),$responsable)){
                        $data['tareas']=$this->historia_usuario->getTareasHistoria($hito,$this->session->userdata('id'));
                    
                        $this->load->view('tarea',$data);
                    }else{
                        $data['error']="NO SE PUDO INSERTAR LA NUEVA TAREA, INTENTE  OTRAVEZ POR FAVOR";
                    
                        $this->load->view('error',$data);
                    }*/
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