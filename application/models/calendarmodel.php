<?php
class Calendarmodel extends CI_Model
{
	var $conf;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

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
	public function eventos($id)
	{
		$sql = "select * from evento_cal where id_usuario='".$id."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	public function getCodGrupo($nombre)
	{
		$sql = "select * from grupo where nombre_corto ='".$nombre."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	public function eventosGrupos($grupos, $serie)
	{
		$sql = "select * from evento_cal e, evento_particular ep where (ep.cod_grupo ='".$grupos."' or  ep.cod_grupo = '".$serie."') and ep.id_evento = e.id";
		$consulta = $this->db->query($sql);
		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
		/*$lista=array();    
			foreach ($consulta->result_array() as $row)
				{
					$lista[$row['TITLE']]=$row['title'];
					$lista[$row['START']]=$row['start'];
					$lista[$row['END']]=$row['end'];
				}
		return $lista;*/
	}
	function getGrupos($id){
		
		$sql="select cod_grupo,nombre_corto from grupo where activo=1 and id_docente=".$id;
		$grupos=$this->db->query($sql);
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['cod_grupo']]=$row['nombre_corto'];

				}

		return $arreglo;
	}
}

?>
