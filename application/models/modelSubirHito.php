<?php
/**
* SUBIR HITOs
*/
class ModelSubirHito extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	//insertar doc en la base de datos 
	function agregarHito($CODG, $IDE, $nombre, $descripcion,$fecha)
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
	//buscar ide de evento
	function verificarFechaEvento($cod_grupo)
	{
		$sql = "select e.fecha_evento from evento e, evento_particular ep where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento >= current_date and e.id_tipo_evento = '4' order by fecha_evento limit 1";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//obtener la lista de eventos de una fecha
	function listaEventoHito($cod_grupo, $fecha)
	{
		$sql = "select te.nombre_tipo_evento from evento_particular ep, evento e, tipo_evento te where ep.cod_grupo = '".$cod_grupo."' and ep.id_evento = e.id_evento and e.fecha_evento = '".$fecha."' and e.id_tipo_evento = te.id_tipo_evento and (te.id_tipo_evento = '4' or te.id_tipo_evento = '5')";
		$query = $this->db->query($sql);
		 $lista=array();
		foreach ($query->result_array() as $row)
				{
					$lista[$row['nombre_tipo_evento']]=$row['nombre_tipo_evento'];
				}
		return $lista;
	}	
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

}
?>