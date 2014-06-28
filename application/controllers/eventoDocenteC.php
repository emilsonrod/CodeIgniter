<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventoDocenteC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('eventoDocenteM');
	}

	public function index()
	{
			//$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');

		if(isset($this->session->userdata['usuario'])){
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
                    $mensage['error']='Lo sentimos no tiene grupos';
                      $this->load->view('eventoDocente',$mensaje);
                }

            //	 $this->load->view('eventoDocente',$data);
			    // $this->load->view('EventoDocente',$datas);
			}
	}
	public function tocalendar()
    {
        $todo=$this->input->post('todos');
        $lista= $this->input->post('tipo');
        $tipoevento=$this->eventoDocenteM->idEvento($lista);
        $nomgrupo=$this->input->post('grupos');

        if($nomgrupo != $todo){
                $nombregrupo=$this->eventoDocenteM->nombreGrupo($nomgrupo);

            	$allday 	=	($this->input->post('allday')==1) ? 'true' : 'false';
            	
            	$startdate	=	str_replace('/', '-', $this->input->post('startdate'));
            	$startdate	=	date('Y-m-d',strtotime($startdate));

            	$enddate	=	str_replace('/', '-', $this->input->post('enddate'));
            	$enddate	=	date('Y-m-d',strtotime($enddate));

            	if($allday=='true') // como cadena y no booleano ya que así es como va a la base de datos
            	{
            		$startdate	=	$startdate . ' 00:00:00';
            		$enddate	=	$enddate . ' 00:00:00';
            	} else {
            		$startdate	=	$startdate . ' ' .$this->input->post('starthour') . ':00';
            		$enddate	=	$enddate . ' ' .$this->input->post('endhour') . ':00';
            	}

            	$data=array(
            		'aviso'		       =>	$this->input->post('event'),
            		'inicio'		   =>	$startdate,
            		'fecha_evento'	   =>	$enddate,
            		'id_tipo_evento'   =>   $tipoevento,
            		'id_usuario'	   =>   $this->session->userdata('id'),
            		'dias'	           =>	($this->input->post('allday')==1) ? 'true' : 'false'
            		);
            	$this->db->insert('evento',$data);

                $datas=array(
                    'cod_grupo'   =>   $nombregrupo,
                    'id_evento'   =>   $this->eventoDocenteM->recuperarId()
                    );
                $this->db->insert('evento_particular',$datas);

        		redirect('calendar2');
            }
            else{

                $allday     =   ($this->input->post('allday')==1) ? 'true' : 'false';
                
                $startdate  =   str_replace('/', '-', $this->input->post('startdate'));
                $startdate  =   date('Y-m-d',strtotime($startdate));

                $enddate    =   str_replace('/', '-', $this->input->post('enddate'));
                $enddate    =   date('Y-m-d',strtotime($enddate));

                if($allday=='true') // como cadena y no booleano ya que así es como va a la base de datos
                {
                    $startdate  =   $startdate . ' 00:00:00';
                    $enddate    =   $enddate . ' 00:00:00';
                } else {
                    $startdate  =   $startdate . ' ' .$this->input->post('starthour') . ':00';
                    $enddate    =   $enddate . ' ' .$this->input->post('endhour') . ':00';
                }

                $data=array(
                    'aviso'            =>   $this->input->post('event'),
                    'inicio'           =>   $startdate,
                    'fecha_evento'     =>   $enddate,
                    'id_tipo_evento'   =>   $tipoevento,
                    'id_usuario'       =>   $this->session->userdata('id'),
                    'dias'             =>   ($this->input->post('allday')==1) ? 'true' : 'false'
                    );
                $this->db->insert('evento',$data);               

                redirect('calendar2');   

            }
        }

}
