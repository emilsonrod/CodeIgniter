<?php

class RegGrupoC extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('regGrupoM');
	}	
	function index()
	{			
		$this->form_validation->set_rules('grupo', 'Grupo', '');			
		$this->form_validation->set_rules('contrasenya', 'Contraseña', 'required|trim|xss_clean|max_length[10]');
			
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('registrarseGrupo_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'grupo' => set_value('grupo'),
					       	'contrasenya' => set_value('contrasenya')
						);
					
			// run insert model to write data to db
		
			if ($this->regGrupoM->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('regGrupoC/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>