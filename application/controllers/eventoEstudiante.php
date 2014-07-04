<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventoEstudiante extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendarmodel');
        $this->load->library('form_validation');
	}

	public function index()
	{
			//$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');
        //$this->form_validation->set_rules('startdate','startdate','required|date|chk_date[<=]');
       // $this->form_validation->set_rules('enddate','enddate','required|date|chk_date[<=]');
		if(isset($this->session->userdata['usuario'])){
            $this->form_validation->set_rules('startdate','Fecha inicio','trim|required');
            $this->form_validation->set_rules('enddate','Fecha final','trim|required');
            $this->form_validation->set_rules('tipo','Tipo evento','trim|required');
            $this->form_validation->set_rules('event','Evento','trim|required');

            $this->form_validation->set_message('required','El campo %s es obligatorio');
            if($this->form_validation->run()==FALSE)
            {
		      	 $lista=$this->calendarmodel->tipoEvento();
                 $arreglo=array();
                	 foreach($lista as $value){
                   		 $arreglo[$value]=$value;
                	}
               	 $data['tipo']=$arreglo;
				 $this->load->view('eventoEstudianteV',$data);
			 }
             else
             {
                $startdate  =   str_replace('/', '-', $this->input->post('startdate'));
                $startdate  =   date('Y-m-d',strtotime($startdate));

                $enddate    =   str_replace('/', '-', $this->input->post('enddate'));
                $enddate    =   date('Y-m-d',strtotime($enddate));

                 $lista= $this->input->post('tipo');
                 $tipoevento=$this->calendarmodel->idEvento($lista);

                $data=array(
                    'aviso'     =>  $this->input->post('event'),
                    'inicio'        =>  $startdate,
                    'fecha_evento'      =>  $enddate,
                    'id_tipo_evento'    =>$tipoevento,
                    'id_usuario'    =>   $this->session->userdata('id')
                    );
                $this->db->insert('evento',$data);
                redirect('calendar2');
             } 
		}
	}
}
