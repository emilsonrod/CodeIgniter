<?php
class GruposInscritosGlobal extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('modelGrupo');
	}
	function index()
	{
		$this->load->library('table');
		$data['grupos']=$this->modelGrupo->gruposCreados();
		
        $this->load->view('viewGruposCreados',$data);

	}
}
?>
