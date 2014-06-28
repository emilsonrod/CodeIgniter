<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Calendar2 extends CI_Controller 
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('calendarmodel');
			$this->load->helper('date');

		}
		function index()
		{
			$this->load->view('viewCabecera');
			//$this->load->view('viewIzquierda');
			$this->load->view('calendarindex');
		}
    
    public function tocalendar()
    {
        $allday     =   ($this->input->post('dias')==1) ? 'true' : 'false';
        
        $startdate  =   str_replace('/', '-', $this->input->post('startDate'));
        $startdate  =   date('Y-m-d',strtotime($startdate));

        $enddate    =   str_replace('/', '-', $this->input->post('endDate'));
        $enddate    =   date('Y-m-d',strtotime($enddate));

        if($allday=='true') // como cadena y no booleano ya que así es como va a la base de datos
        {
            $startdate  =   $startdate . ' 00:00:00';
            $enddate    =   $enddate . ' 00:00:00';
        } else {
            $startdate  =   $startdate . ' ' .$this->input->post('startHour') . ':00';
            $enddate    =   $enddate . ' ' .$this->input->post('endHour') . ':00';
        }

        $data=array(
            'aviso'              =>  $this->input->post('what'),
            'inicio'             =>  $startdate,
            'fecha_evento'       =>  $enddate,
            'dias'    =>  ($this->input->post('dias')==1) ? 'true' : 'false'
            );
        $this->db->insert('evento',$data);
        redirect(base_url(),'refresh');
    }



		public function json()
    	{  
       		 header("Content-Type: application/json");  
        	 echo $this->calendar->jsonEvents();
  		} 
  		 public function resize()
    	{
    		header("Content-Type: application/json");  
    		$data = array(
    			'event'			=>	$this->input->post('event'),
    			'daystart'		=>	$this->input->post('daystart'),
    			'dayend'		=>	$this->input->post('dayend'),
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
    			'event'			=>	$this->input->post('event'),
    			'daystart'		=>	$this->input->post('daystart'),
    			'dayend'		=>	$this->input->post('dayend'),
    		);

			echo $this->calendar->drop_event($data);
    	}
    	public function delete_event()
    	{
    		header("Content-Type: application/json");  
    		echo $this->calendar->delete($this->input->post('event')) ? 'el evento ha sido borrado' : 'El evento no pudo borrarse';
    	}
	}
?>