<?php
/**
* SUBIR DOCUMENTOS
*/
class ModelSubirDoc extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	//registrar documentos subidos 
	function agregarDoc($CODG, $IDE, $nombre, $descripcion,$fecha)
	{
		$Datos = array('COD_GRUPO' => $CODG,
					   'ID_EVENTO' => $IDE,
					   'NOMBRE_ENTREGA' =>$nombre,
					   'FECHA_ENTREGA' => $fecha,
					   'COMENTARIO' => $descripcion,
					   );
		$this->db->insert('entrega', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//subir Doc Docentes
	function agregarDocDoc($id_usuario, $nombre, $descripcion,$fecha)
	{
		$Datos = array('ID_USUARIO' => $id_usuario,
					   'NOMBRE_DOC' =>$nombre,
					   'FECHA_SUBIDA' => $fecha,
					   'DESCRIPCION' => $descripcion,
					   );
		$this->db->insert('documento_docente', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//obtener el grupo del q inicio sesion 
	function getCodGrupo($id)
	{
		$sql="select cod_grupo from integrantes_grupo where id_usuario='".$id."' limit 1";
		$grupos=$this->db->query($sql);	
		if ($grupos->num_rows() >0)
        {
            return $grupos;
        }else{
            return false;
        }
	}
	//verifica si esta inscrito o no
	function inscrito($id){
        $query= $this->db->query("SELECT * FROM integrantes_grupo WHERE id_usuario=".$id);
        if ($query->num_rows() >0)
        {
            return true;
        }else{
            return false;
        }
    }
    //verificar si hay evento para el grupo y si el evento es de TIPO SOLO DOCUMENTACION y si aun estamos en fecha para entregar
    /*function verificarEventoDoc($id_doc)
    {
    	$sql = "select * from evento where fecha_evento >= current_date  and id_usuario = '".$id_doc."' order by fecha_evento limit 1 "; 
    	$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
    }*/
    function verificarEventoDoc($cod_grupo)
	{
		$sql = "select e.fecha_evento from evento e, evento_particular ep where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento >= current_date and e.id_tipo_evento = '' order by fecha_evento limit 1";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
    function obtenerDocente($grupo)
    {
    	$sql = "select id_docente from grupo where cod_grupo = '".$grupo."'";
    	$consulta = $this->db->query($sql);

		if($consulta -> num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}

    }
	//listar fechas eventos para eventos.
	/*
	 function listaEventos($id_doc, $fecha)
	 {
    	$sql="SELECT te.nombre_tipo_evento  FROM evento e, tipo_evento te where e.id_usuario = '".$id_doc."' and e.fecha_evento >= current_date  and e.fecha_evento = '".$fecha."' and e.id_tipo_evento = te.id_tipo_evento  order by fecha_evento";
		$query = $this->db->query($sql);        
        $lista=array();
		foreach ($query->result_array() as $row)
				{
					$lista[$row['nombre_tipo_evento']]=$row['nombre_tipo_evento'];
				}
		return $lista;
    }*/
    //obtenr id del evnto para ingresar en entrega
     function getEvento($nombre_tipo_evento, $cod_grupo, $fecha)
    {
    	$sql = "select e.id_evento from evento e, tipo_evento te, evento_particular ep where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento = '".$fecha."' and e.id_tipo_evento = te.id_tipo_evento and te.nombre_tipo_evento = '".$nombre_tipo_evento."' ";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}	
    }
    /*
    function getEvento($nombre_tipo_evento, $id_doc, $fecha)
    {
    	$sql = "select e.id_evento from evento e, tipo_evento te where te.nombre_tipo_evento = '".$nombre_tipo_evento."' and te.id_tipo_evento = e.id_tipo_evento and e.id_usuario = '".$id_doc."' and  e.fecha_evento = '".$fecha."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}	
    }*/
    //buscar ide de evento
	function verificarFechaEventoD($cod_grupo)
	{
		$sql = "select e.fecha_evento from evento e, evento_particular ep where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento >= current_date and (e.id_tipo_evento = '1' or e.id_tipo_evento = '2') order by fecha_evento limit 1";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	function listaEvento($cod_grupo, $fecha)
	{
		$sql = "select te.nombre_tipo_evento from evento_particular ep, evento e, tipo_evento te where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento = '".$fecha."' and e.id_tipo_evento = te.id_tipo_evento and (te.id_tipo_evento = '1' or te.id_tipo_evento = '2')";
		$query = $this->db->query($sql);
		 $lista=array();
		foreach ($query->result_array() as $row)
				{
					$lista[$row['nombre_tipo_evento']]=$row['nombre_tipo_evento'];
				}
		return $lista;
	}
	function listaEventoD($cod_grupo, $fecha)
	{
		$sql = "select te.nombre_tipo_evento from evento_particular ep, evento e, tipo_evento te where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento = '".$fecha."' and e.id_tipo_evento = te.id_tipo_evento and (te.id_tipo_evento = '1' or te.id_tipo_evento = '2')";
		$query = $this->db->query($sql);
		 $lista=array();
		foreach ($query->result_array() as $row)
				{
					$lista[$row['nombre_tipo_evento']]=$row['nombre_tipo_evento'];
				}
		return $lista;
	}	
}
?>