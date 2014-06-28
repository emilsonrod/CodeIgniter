<?php
class EventoDocenteM extends CI_Model
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
	             'id_usuario'		=> $entry->id_usuario,
	            'aviso' 			=> $entry->aviso,
	            'dias'				=> ($entry->dias=='true') ? true : false,


	        );
	    }
	    return json_encode($jsonevents);
	}
	public function jsonEventP()
	{
		$eventparticular = $this->db->get('evento_particular')->result();	
			    //para evento particular 
	    $jsoneventparticular = array();
	    foreach ($eventparticular as $entry)
	    {
	        $jsoneventparticular[] = array(
	            'cod_grupo'			=> $entry->cod_grupo,
	            'id_evento' 		=> $entry->id_evento,

	        );
	    }
	    return json_encode($jsoneventparticular);
	}

	function getGrupos($id){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
        $sql="select cod_grupo,nombre_corto from grupo where activo=1 and id_docente=".$id;
		$grupos=$this->db->query($sql);
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['cod_grupo']]=$row['nombre_corto'];

				}

		return $arreglo;
	}
	function nombreGrupo($grupo){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
		//$sql="select cod_grupo from grupo where nombre_corto='".$grupo."'";
        $sql="select cod_grupo from grupo where nombre_corto='".$grupo."'";
		$grupos=$this->db->query($sql);
		$data=$grupos->row()->cod_grupo;
		return $data;
	}
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
        $sql="select id_tipo_evento ,nombre_tipo_evento from tipo_evento where id_tipo_evento=1 or id_tipo_evento=2 or id_tipo_evento=3";
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


}
?>
