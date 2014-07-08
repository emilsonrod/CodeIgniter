<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventoDocenteC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('eventoDocenteM');
        $this->load->helper('form');
        $this->load->library('form_validation');
      
	}

	public function index()
	{
			//$this->load->view('viewCabecera');
        
            //echo $this->calendar->generate();
		if(isset($this->session->userdata['usuario']))
        {
            $this->form_validation->set_rules('startdate','Fecha inicio','trim|required|exact_length[10]');
            $this->form_validation->set_rules('enddate','Fecha final','trim|required|exact_length[10]');
            $this->form_validation->set_rules('event','Evento','trim|required|max_lenght[250]|min_length[10]');
            //$this->form_validation->set_rules('grupos','grupos','trim|required');
            $this->form_validation->set_rules('tipo','Tipo de evento','trim|required');
            //$this->form_validation->set_rules('startdate','Fecha inicio','required|date|chk_date[<=]');

            $this->form_validation->set_message('required','El campo %s es obligatorio');
            $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
            $this->form_validation->set_message('min_length', 'El Campo %s debe tener un Minimo de %d Caracteres');
            $this->form_validation->set_message('exact_length', 'El Campo %s tiene el formato DD/MM/AAAA');

            if($this->form_validation->run()==FALSE)
            {

		      	 $lista=$this->eventoDocenteM->tipoEvento();
                 $arreglo=array();
                	 foreach($lista as $value){
                   		 $arreglo[$value]=$value;
                	}
               	 $data['tipo']=$arreglo;

                $data['grupos']=$this->eventoDocenteM->getGrupos($this->session->userdata('id'));

                $numeroGrupos=count($data['grupos']);
                if($numeroGrupos>0){
                    //$this->load->view('eventoDocente');
                    //$this->load->view('viewIzquierda');
                    $this->load->view('eventoDocente',$data);
                }else{
                    $mensage['error']='No puede crear eventos sin tener grupos';
                    $this->load->view('viewNoGrupos',$mensage);
                }
            }
            else
            {
                $todo=$this->input->post('todos');
                $lista= $this->input->post('tipo');
                $tipoevento=$this->eventoDocenteM->idEvento($lista);
                $nomgrupo=$this->input->post('grupos');

                if($nomgrupo != $todo)
                {
                        $nombregrupo=$this->eventoDocenteM->nombreGrupo($nomgrupo);

                        //$allday   =   ($this->input->post('allday')==1) ? 'true' : 'false';

                        
                        $startdate1  =   str_replace('/', '-', $this->input->post('startdate'));
                        $startdate  =   date('Y-m-d',strtotime($startdate1));

                        $enddate1    =   str_replace('/', '-', $this->input->post('enddate'));
                        $enddate    =   date('Y-m-d',strtotime($enddate1));

                        $nuevafecha1 = strtotime ( '+1 day' , strtotime ( $enddate ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha1 );

                        $data=array(
                            'aviso'            =>   $this->input->post('event'),
                            'inicio'           =>   $startdate,
                            'fecha_evento'     =>   $enddate,
                            'id_tipo_evento'   =>   $tipoevento,
                            'id_usuario'       =>   $this->session->userdata('id'),
                            );
                        $this->db->insert('evento',$data);

                        $datas=array(
                            'cod_grupo'   =>   $nombregrupo,
                            'id_evento'   =>   $this->eventoDocenteM->recuperarId()
                            );
                        $this->db->insert('evento_particular',$datas);

                        $data2=array(
                            'title'            =>   $this->input->post('event'),
                            'start'           =>   $startdate,
                            'end'              =>   $nuevafecha,
                            'id_tipo_evento'   =>   $tipoevento,
                            'id_usuario'       =>   $this->session->userdata('id'),
                            );
                         $this->db->insert('evento_cal',$data2);
                        redirect('calendarEvento');
                    }
                    else
                    {

                        $startdate1  =   str_replace('/', '-', $this->input->post('startdate'));
                        $startdate  =   date('Y-m-d',strtotime($startdate1));

                        $enddate1    =   str_replace('/', '-', $this->input->post('enddate'));
                        $enddate    =   date('Y-m-d',strtotime($enddate1));

                        $nuevafecha1 = strtotime ( '+1 day' , strtotime ( $enddate ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha1 );

                        $data=array(
                            'aviso'            =>   $this->input->post('event'),
                            'inicio'           =>   $startdate,
                            'fecha_evento'     =>   $enddate,
                            'id_tipo_evento'   =>   $tipoevento,
                            'id_usuario'       =>   $this->session->userdata('id')
                            );
                        $this->db->insert('evento',$data);               

                         $datas=array(
                            'cod_grupo'   =>   $this->session->userdata('id')."99",
                            'id_evento'   =>   $this->eventoDocenteM->recuperarId()
                            );
                         $this->db->insert('evento_particular',$datas);

                          $data2=array(
                            'title'            =>   $this->input->post('event'),
                            'start'           =>   $startdate,
                            'end'              =>   $nuevafecha,
                            'id_tipo_evento'   =>   $tipoevento,
                            'id_usuario'       =>   $this->session->userdata('id'),
                            );
                         $this->db->insert('evento_cal',$data2);
                         
                        redirect('calendarEvento');   

                     }
            }

		}
          
	}

}