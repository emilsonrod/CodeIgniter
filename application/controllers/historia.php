<?php
class Historia extends CI_Controller
{
    function __construct()
  {
    parent::__construct();
        $this->load->helper('form');
    $this->load->model('historiaUsuario');
    $this->load->library('form_validation');
  }
  public function index()
  {    
    if(isset($this->session->userdata['usuario'])){
             $this->form_validation->set_rules('historiaNueva', 'Nueva Historia','trim|required|min_length[8]|callback_unicaHistoria');
        
         $this->form_validation->set_message('required', 'El campo %s es obligatorio');
         $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
         $this->form_validation->set_message('alpha', 'El campo %s debe contener solo letras');
         $this->form_validation->set_message('unicaHistoria', 'Ya existe esta historia de usuario');
            
           if ($this->form_validation->run() == FALSE)
           {  $historias= $this->historiaUsuario->getHitos($this->session->userdata('id'));
                if($historias!==false){
                $data['hitos']=$historias;
          $this->load->view('vistaHistoria',$data);
                }else{
                    $data['error']="No pertenece a un grupo";
                    $this->load->view('error',$data);
                }                
       }else
      {   
              $nuevaHistoria=$_POST['historiaNueva'];
              if($this->historiaUsuario->agregarNuevoHito($this->session->userdata('id'),$nuevaHistoria)){
               $data['hitos']= $this->historiaUsuario->getHitos($this->session->userdata('id'));
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
    public function unicaHistoria(){
        return $this->historiaUsuario->noRepetido($this->input->post('historiaNueva'),$this->session->userdata('id'));
    }
}
?>