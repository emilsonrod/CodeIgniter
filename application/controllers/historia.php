<?php
class Historia extends CI_Controller
{
    function __construct()
  {
    parent::__construct();
        $this->load->helper('form');
    $this->load->model('historia_usuario');
    $this->load->library('form_validation');
  }
  public function index()
  {    
    if(isset($this->session->userdata['usuario'])){
             $this->form_validation->set_rules('historiaNueva', 'Nueva Historia','trim|required|min_length[8]|callback_unicoHito');
        
         $this->form_validation->set_message('required', 'El campo %s es obligatorio');
         $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
         $this->form_validation->set_message('alpha', 'El campo %s debe contener solo letras');
         $this->form_validation->set_message('unicoHito', 'Ya existe este hito');
            
           if ($this->form_validation->run() == FALSE)
           {  
              if($this->historia_usuario->inscritoGrupo($this->session->userdata('id'))){
                $hitos= $this->historia_usuario->getHitos($this->session->userdata('id'));
                $data['hitos']=$hitos;
                $this->load->view('vistaHistoria',$data);
                
              }else{echo '<script>window.alert("No esta inscrito en un grupo inscribase o registre nuevo grupo");location.href="registrarseGrupo";</script>';
              }                
          }else
             {   
                $nuevaHistoria=$_POST['historiaNueva'];
                if($this->historia_usuario->agregarNuevoHito($this->session->userdata('id'),$nuevaHistoria)){
                  $data['hitos']= $this->historia_usuario->getHitos($this->session->userdata('id'));
                  $this->load->view('vistaHistoria',$data);
                }else{
                    $data['error']="No se pudo agregar la nueva historia, intente otra vez por favor";
                    $this->load->view('error',$data);
             }  
          }        
            
        }else{
      redirect('inicio');
    }
  }
    public function unicoHito(){
        return $this->historia_usuario->hitoRepetido($this->input->post('historiaNueva'),$this->session->userdata('id'));
    }
}
?>