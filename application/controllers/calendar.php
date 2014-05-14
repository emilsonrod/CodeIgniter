<?php
class Calendar extends CI_Controller
{
	function index($year = null , $month = null)
	{
		if(isset($this->session->userdata['usuario'])){
			$data2['tareas']=$this->session->userdata('tareas');
			$this->load->view('viewCabecera');
			$this->load->view('viewIzquierda',$data2);

			if(!$year)
			{
				$year = date('Y');
			}
			if(!$month)
			{
				$month = date('m');
			}

			$this->load->model('calendarmodel');

			if($day = $this->input->post('day'))
			{
				$this->calendarmodel->add_calendar_data(
					"$year-$month-$day",
					$this->input->post('data')
				);
			}

			$data['calendar'] = $this->calendarmodel->generate($year, $month);


			$this->load->view('calendarview',$data);
			$this->load->view('viewDerecha');
			$this->load->view('viewPiePagina');
		}
		else{
			redirect('calendar/index');
		}
	}
}
?>
