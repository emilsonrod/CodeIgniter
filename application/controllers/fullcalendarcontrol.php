<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class FullCalendarControl extends CI_Controller {
 
    /**
    * Welcome
    */
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('fullcalendar','calendar');
        $this->load->helper('date');
    }
 
    /**
    * Asigna el contenido de los ficheros necesarios
    * para head (css) y footer (js)
    ****
    * @access public
    * @param none
    * @return none
    */
    public function index()
    {
        /*$files_head     =   array(
            base_url('css/fullcalendar.css')
            );
 
        $files_footer   =   array(
            'js/jquery-1.8.3.min.js',
            'js/jquery-ui-1.9.2.custom.min.js',
            'js/fullcalendar.min.js',
            'js/mycalendar.js'
            );
 
        $files          =   array(
            'head'      =>  $files_head,
            'footer'    =>  $files_footer
            );*/
 
        //$this->load->view('fullcal',$files);
        $perfil=$this->session->userdata['perfil'];
        if($perfil == "docente"){
            $this->load->view('fullcaldoc');
        }
        else{
            $this->load->view('fullcal');
        }
    }
 
    /**
    * Genera los eventos y los muestra
    * esta función es llamada desde mycalendar.js
    ****
    * @access public
    * @param none
    * @return none
    */
    public function json()
    {  
        header("Content-Type: application/json");  
        echo $this->calendar->jsonEvents();
    }
 
    /**
    * Recibe datos para cambiar de tamaño el evento dado
    * esta función es llamada desde mycalendar.js
    ****
    * @access public
    * @param none
    * @return none
    */
    public function resize()
    {
        header("Content-Type: application/json");  
        $data = array(
            'event'         =>  $this->input->post('event'),
            'daystart'      =>  $this->input->post('daystart'),
            'dayend'        =>  $this->input->post('dayend'),
        );
 
        echo $this->calendar->resize($data);
    }
 
    /**
    * Mueve el evento
    * esta función es llamada desde mycalendar.js
    ****
    * @access public
    * @param none
    * @return none
    */
    public function drop_event()
    {
        header("Content-Type: application/json");  
        $data = array(
            'event'         =>  $this->input->post('event'),
            'daystart'      =>  $this->input->post('daystart'),
            'dayend'        =>  $this->input->post('dayend'),
        );
 
        echo $this->calendar->drop_event($data);
    }
 
    /**
    * borra el evento
    * esta función es llamada desde mycalendar.js
    ****
    * @access public
    * @param none
    * @return none
    */
   
    public function delete_event()
    {
        header("Content-Type: application/json");  
        echo $this->calendar->delete($this->input->post('event')) ? 'el evento ha sido borrado' : 'El evento no pudo borrarse';
    }
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */