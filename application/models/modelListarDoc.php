<?php
/**
* SUBIR HITOs
*/
class ModelListarDoc extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	//listar documentos docente
	function listarDocDocentes($id_docente)
	{
		$sql = "select * from documento_docente where id_usuario = '".$id_docente."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//istar Documentos grupos
	function listarDocEst($id)
	{
		$sql = "select * from entrega where id_usuario = '".$id."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//listar hitos de grupos =)
	function listarHitosEst($cod_grupo)
	{
		$sql = "select e.id_entrega, e.nombre_entrega, e.fecha_entrega, e.comentario  from entrega e, evento ev where e.cod_grupo ='".$cod_grupo."' and  e.id_evento = ev.id_evento and (ev.id_tipo_evento ='4' or ev.id_tipo_evento ='5') order by id_entrega";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//listar hitos de grupos =)
	function listarDocumentosEst($cod_grupo)
	{
		$sql = "select e.id_entrega, e.nombre_entrega, e.fecha_entrega, e.comentario  from entrega e, evento ev where e.cod_grupo ='".$cod_grupo."' and  e.id_evento = ev.id_evento and (ev.id_tipo_evento ='1' or ev.id_tipo_evento ='2') order by id_entrega";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//CONSULTA ARCHIVO POR ID
	function consultarDoc($idArchivo)
	{
		$this->db->select('*');
		$this->db->from('documento_docente');
		$this->db->where('COD_DOC_DOC',$idArchivo);
		$query = $this->db->get();
		if($query ->num_rows() > 0)
		{
			return $query;
		}
		else{
			return FALSE;
		}
	}
	//BORRAR DOCUMNTOS POR ID ARCHIVO
	function borrarDoc($idArchivo)
	{
		$this->db->where('COD_DOC_DOC',$idArchivo);
		$this->db->delete('documento_docente');

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//consultar hito
	function consultarHito($idArchivo)
	{
		$this->db->select('*');
		$this->db->from('entrega');
		$this->db->where('id_entrega',$idArchivo);
		$query = $this->db->get();
		if($query ->num_rows() > 0)
		{
			return $query;
		}
		else{
			return FALSE;
		}
	}
	//BORRAR hitos POR ID ARCHIVO
	function borrarHito($idArchivo)
	{
		$this->db->where('id_entrega',$idArchivo);
		$this->db->delete('entrega');

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//CONSULTA archivo
	function consultarDocEst($idArchivo)
	{
		$this->db->select('*');
		$this->db->from('entrega');
		$this->db->where('id_entrega',$idArchivo);
		$query = $this->db->get();
		if($query ->num_rows() > 0)
		{
			return $query;
		}
		else{
			return FALSE;
		}
	}
	//BORRAR DOCUMNTOS POR ID ARCHIVO
	function borrarDocEst($idArchivo)
	{
		$this->db->where('id_entrega',$idArchivo);
		$this->db->delete('entrega');

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//
	function listarConvocatoria($id_docente)
	{
		$sql = "select * from documento_docente where id_usuario = '".$id_docente."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
}
?>