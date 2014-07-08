<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventoEstudiante extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendarmodel');
        $this->load->model('modelSubirDoc');
        $this->load->model('eventoDocenteM');
        $this->load->library('form_validation');
	}

	public function index()
	{
			//$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');
        //$this->form_validation->set_rules('startdate','startdate','required|date|chk_date[<=]');
       // $this->form_validation->set_rules('enddate','enddate','required|date|chk_date[<=]');
		if(isset($this->session->userdata['usuario'])){
            $this->form_validation->set_rules('startdate','Fecha inicio','trim|required|exact_length[10]');
            $this->form_validation->set_rules('enddate','Fecha final','trim|required|exact_length[10]');
            $this->form_validation->set_rules('event','Evento','trim|required|max_lenght[250]|min_length[10]');
            $this->form_validation->set_rules('tipo','Tipo evento','trim|required');
           // $this->form_validation->set_rules('event','Evento','trim|required');

            $this->form_validation->set_message('required','El campo %s es obligatorio');
            $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
            $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
            $this->form_validation->set_message('exact_length', 'El Campo %s tiene el formato DD/MM/AAAA');
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
                $startdate1  =   str_replace('/', '-', $this->input->post('startdate'));
                $startdate  =   date('Y-m-d',strtotime($startdate1));

                $enddate1    =   str_replace('/', '-', $this->input->post('enddate'));
                $enddate    =   date('Y-m-d',strtotime($enddate1));

                $nuevafecha1 = strtotime ( '+1 day' , strtotime ( $enddate ) ) ;
                $nuevafecha = date ( 'Y-m-j' , $nuevafecha1 );

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
                $codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
                foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}
                $datas=array(
                            'cod_grupo'   =>   $CODG,
                            'id_evento'   =>   $this->eventoDocenteM->recuperarId()
                            );
                $this->db->insert('evento_particular',$datas);

                redirect('fullcalendarcontrol');
             } 
		}
	}
}
