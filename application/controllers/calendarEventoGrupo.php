<?php
class calendarEventoGrupo extends CI_Controller
{
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
			$data['grupos']=$this->calendarmodel->getGrupos($this->session->userdata('id'));
			$numeroGrupos=count($data['grupos']);


			$json = array();
			 // requête qui récupère les événements
			 //$requete = "SELECT * FROM evenement ORDER BY id";
			$nombre=$this->input->post('integrantes');
			if($nombre == "micalendario")
			{
				redirect('calendarEvento');
			}
			else{
				$codGrupo = $this->calendarmodel->getCodGrupo($nombre);
				foreach ($codGrupo->result() as $fila) {$CODG = $fila->COD_GRUPO;}


				/*$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
				foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}*/

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
				 $data['nombre']=$nombre;	
				$data['eventos']=json_encode($fechas->result_array());
				$this->load->view('viewCalendarEventoGrupos',$data);  
			}
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
		$nombre=$this->input->post('integrantes');
		$codGrupo = $this->calendarmodel->getCodGrupo($nombre);
		foreach ($codGrupo->result() as $fila) {$CODG = $fila->COD_GRUPO;}


		/*$codGrupo = $this->modelSubirDoc->getCodGrupo($this->session->userdata('id'));
		foreach ($codGrupo->result() as $fila) {$CODG = $fila->cod_grupo;}*/

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