<?php
class calendarEvento extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendarmodel');
        $this->load->library('form_validation');
        //$this->load->library('session');
	}

	public function index()
	{
		if (isset($this->session->userdata['usuario'])) 
		{
			$data['grupos']=$this->calendarmodel->getGrupos($this->session->userdata('id'));
			$fechas = $this->calendarmodel->eventos( $this->session->userdata('id'));

			$data['misEventos']= $fechas;

			$numeroGrupos = count($data['grupos']);
			if($numeroGrupos > 0)
			{
				$this->load->view('viewCalendarEvento', $data); 
			}
			else{

			}	
		//$json = array();
		 // requête qui récupère les événements
		 //$requete = "SELECT * FROM evenement ORDER BY id";
		 //$fechas = $this->calendarmodel->eventos();
		 
		 /*connexion à la base de données
		 try {
		 $bdd = new PDO('mysql:host=localhost; dbname=fullcalendar', 'root', '');
		 } catch(Exception $e) {
		 exit('Impossible de se connecter à la base de données.');
		 }
		 // exécution de la requête*/
		 // $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
		 
		 // envoi du résultat au success
		  //echo json_encode($fechas->result_array());
 		}else
		{
			redirect('inicio');
		}
	}
	public function getEventos()
	{
		$json = array();
		 // requête qui récupère les événements
		 //$requete = "SELECT * FROM evenement ORDER BY id";
		 $fechas = $this->calendarmodel->eventos( $this->session->userdata('id'));
		 
		 /*connexion à la base de données
		 try {
		 $bdd = new PDO('mysql:host=localhost; dbname=fullcalendar', 'root', '');
		 } catch(Exception $e) {
		 exit('Impossible de se connecter à la base de données.');
		 }
		 // exécution de la requête*/
		 // $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
		 
		 // envoi du résultat au success
		 //echo json_encode($fechas->fetchAll(PDO::FETCH_ASSOC));	
		echo json_encode($fechas->result_array());
	}
}  	
?>