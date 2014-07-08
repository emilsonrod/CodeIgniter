<?php
class Calendarmodel extends CI_Model
{
	var $conf;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	public function jsonEvents()
	{
	    
	    $events = $this->db->get('evento')->result();
	    
	    $jsonevents = array();
	    foreach ($events as $entry)
	    {
	        $jsonevents[] = array(
	        	'fecha_evento'		=> $entry->fecha_evento,
	            'inicio'			=> $entry->inicio,
	            'id_evento' 		=> $entry->id_evento,
	            'id_tipo_evento'	=> $entry->id_tipo_evento,
	             'd_usuario'		=> $entry->id_usuario,
	            'aviso' 			=> $entry->aviso,
	            'dias'				=> ($entry->dias=='true') ? true : false,


	        );
	    }
	    return json_encode($jsonevents);
	}
	function idGrupo($id){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
		//$sql="select cod_grupo from grupo where nombre_corto='".$grupo."'";
        $sql="select ig.cod_grupo from integrantes_grupo ig, usuario u where ig.id_usuario ='".$id."' AND u.id_usuario =".$id;
		$grupos=$this->db->query($sql);
		$data=$grupos->row()->cod_grupo;
		return $data;
	}
	//SELECT ig.cod_grupo FROM integrantes_grupo ig, usuario u WHERE ig.id_usuario =15 AND u.id_usuario =15
	function recuperarId()
	{
		$sql="select MAX(id_evento) as evento from evento";
		$lista=$this->db->query($sql);
		return $lista->row()->evento;
	}

	public function drop_event($data)
	{
		extract($data);
		$new_event = array(
			'inicio'		=>	$daystart,
			'fecha_evento'	=>	$dayend,
		); 
		
		$this->db->where('id_evento',$event);
		$this->db->update('evento',$new_event);
		return $this->db->last_query();
	}
	public function resize($data)
	{
		extract($data);
		$new_event = array(
			'inicio'	=>	$daystart,
			'fecha_evento'	=>	$dayend,
		); 
		
		$this->db->where('id_evento',$event);
		$this->db->update('evento',$new_event);
		return $this->db->last_query();
	}

	/**
	* Borra el evento en la base de datos
	* 
	****
	* @access public
	* @param $id (evento)
	* @return string con el último query (esto debe ser anulado en producción)
	*/
	public function delete($id)
	{
		if($this->db->delete('evento',array('id_evento'=>$id))) return true;
		return false;
	}
	function tipoEvento(){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
        $sql="select id_tipo_evento ,nombre_tipo_evento from tipo_evento where id_tipo_evento=4 or id_tipo_evento=5";
		$grupos=$this->db->query($sql);
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['id_tipo_evento']]=$row['nombre_tipo_evento'];

				}

		return $arreglo;
	}
	function idEvento($tipoevent){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
        $sql="select id_tipo_evento from tipo_evento where nombre_tipo_evento='".$tipoevent."'";
		$arreglo=$this->db->query($sql);
		return $arreglo->row()->id_tipo_evento;
	}



	public function get_calendar_data($year, $month)
	{
		$query = $this->db->select('fecha, comentario')->from('fecha_limite')->like('fecha', "$year-$month", 'after')->get();

		$cal_data = array();

		foreach ($query->result() as $row)
		{
			$cal_data[ltrim(substr($row->fecha,8,2),'0')] = $row->comentario;
		}

		return $cal_data;

	}

	public function add_calendar_data($date,$data)
	{
		if($this->db->select('inicio')->from('evento')
			->where('inicio', $date)->count_all_results())
		{
			$this->db->where('inicio',$date)
					->update('evento', array(
				'inicio' => $date,
				'aviso' => $data
				));
		}
		else
		{
			$this->db->insert('evento',array(
			'inicio' => $date,
			'aviso' => $data
			));
		}


	}

	public function generate($year, $month)
	{

		$this->load->library('calendar',$this->conf);

		$cal_data = $this->get_calendar_data($year, $month);

		return $this->calendar->generate($year, $month, $cal_data);
	}
}

?>
