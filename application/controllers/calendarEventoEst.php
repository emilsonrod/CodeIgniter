<?php
class calendarEventoEst extends CI_Controller
{
	//ESTUDIANTE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendarmodel');
		$this->load->model('modelSubirDoc');
        $this->load->library('form_validation');
	}

	public function index()
	{
		if (isset($this->session->userdata['usuario'])) 
		{
		$this->load->view('viewCalendarEventoest');  	
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
		$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
		foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}
		$IdDocente = $this->modelSubirDoc->obtenerDocente($CODG);
				foreach ($IdDocente->result() as $row) {$IDU = $row->id_docente;}
		$serie = $IDU."99";
		 $fechas = $this->calendarmodel->eventosGrupos( $CODG, $serie);
		 
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