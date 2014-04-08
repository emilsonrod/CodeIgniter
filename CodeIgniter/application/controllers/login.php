<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('modelLogin');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('login');
		$this->form_validation->set_rules('username','username','required');      //   Configuramos las validaciones ayudandonos con la librería form_validation del Framework Codeigniter
        $this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run()==FALSE)
		{
			/*redirect('login');*/
		}
		else
		{
			$this->new_login();
		}
	}	
}
?>