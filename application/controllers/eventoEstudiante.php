<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventoEstudiante extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendarmodel');
	}

	public function index()
	{
			//$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');

		if(isset($this->session->userdata['usuario'])){
		      	 $lista=$this->calendarmodel->tipoEvento();
                 $arreglo=array();
                	 foreach($lista as $value){
                   		 $arreglo[$value]=$value;
                	}
               	 $data['tipo']=$arreglo;
				 $this->load->view('eventoEstudianteV',$data);
			  
			}
	}
	public function tocalendar()
    {
    	$allday 	=	($this->input->post('allday')==1) ? 'true' : 'false';
    	
    	$startdate	=	str_replace('/', '-', $this->input->post('startdate'));
    	$startdate	=	date('Y-m-d',strtotime($startdate));

    	$enddate	=	str_replace('/', '-', $this->input->post('enddate'));
    	$enddate	=	date('Y-m-d',strtotime($enddate));

    	 $lista= $this->input->post('tipo');
    	 $tipoevento=$this->calendarmodel->idEvento($lista);


    	if($allday=='true') // como cadena y no booleano ya que así es como va a la base de datos
    	{
    		$startdate	=	$startdate . ' 00:00:00';
    		$enddate	=	$enddate . ' 00:00:00';
    	} else {
    		$startdate	=	$startdate . ' ' .$this->input->post('starthour') . ':00';
    		$enddate	=	$enddate . ' ' .$this->input->post('endhour') . ':00';
    	}

    	$data=array(
    		'aviso'		=>	$this->input->post('event'),
    		'inicio'		=>	$startdate,
    		'fecha_evento'		=>	$enddate,
    		'id_tipo_evento'	=>$tipoevento,
    		'id_usuario'	=>   $this->session->userdata('id'),
    		'dias'	=>	($this->input->post('allday')==1) ? 'true' : 'false'
    		);
    	$this->db->insert('evento',$data);
		redirect('calendar2');
    }
}
