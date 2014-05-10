<?php
class Calendar extends CI_Controller
{
	function index($year = null , $month = null)
	{
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

		$this->load->view('header');
		$this->load->view('calendarview',$data);
		$this->load->view('footer');
	}
}
?>