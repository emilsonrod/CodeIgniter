<?php
/**
* SUBIR DOCUMENTOS
*/
class Modelmensaje extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	//registrar documentos subidos 
	function registrarMensaje($id, $nombre, $mensaje, $fecha)
	{
		$Datos = array('ID_USUARIO' => $id,
					   'NOMBRE_GRUPO' => $nombre,
					   'MENSAJE' =>$mensaje,
					   'FECHA_PUBLICACION'=> $fecha
					   );
		$this->db->insert('avisos', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function obtenerGrupos($id_docente)
	{
		$sql = "select nombre_corto from grupo where id_docente = '".$id_docente."'";
		$grupos=$this->db->query($sql);	
		if ($grupos->num_rows() > 0)
        {
	        $lista=array();
			foreach ($grupos->result_array() as $row)
					{
						$lista[$row['nombre_corto']]=$row['nombre_corto'];
					}
			return $lista;
        }else{
            return false;
        }
	}
	function listarMensajes($id)
	{
		$sql = "select * from avisos where id_usuario = '".$id."' order by FECHA_PUBLICACION desc";
		$avisos=$this->db->query($sql);	
		if ($avisos->num_rows() > 0)
        {
			return $avisos;
        }else{
            return false;
        }
	}
	function listarMensajesRecibidos($nombre)
	{
		$sql = "select g.nombre_corto, a.id_aviso, a.mensaje , a.fecha_publicacion  from avisos a , grupo g where a.nombre_grupo = '".$nombre."' and a.id_usuario = g.cod_grupo order by FECHA_PUBLICACION desc";
		$avisos=$this->db->query($sql);	
		if ($avisos->num_rows() > 0)
        {
			return $avisos;
        }else{
            return false;
        }
	}
	function listarMensajesRecibidosG($nombreG, $id_doc)
	{
		$sql = "select  *  from avisos  where id_usuario = '".$id_doc."' and (nombre_grupo = '".$nombreG."' or nombre_grupo = 'Todos') order by FECHA_PUBLICACION desc";
		$avisos=$this->db->query($sql);	
		if ($avisos->num_rows() > 0)
        {
			return $avisos;
        }else{
            return false;
        }
	}
	function borrarAviso($idArchivo)
	{
		$this->db->where('ID_AVISO',$idArchivo);
		$this->db->delete('avisos');

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function obtenerNombre($id)
	{
		$sql = "select * from usuario where id_usuario = '".$id."' Limit 1";
		$nombre=$this->db->query($sql);	
		if ($nombre->num_rows() > 0)
        {
			return $nombre;
        }else{
            return false;
        }
	}
	function obtenerIdDoc($nombre)
	{
		$sql = "select * from avisos where nombre_grupo = '".$nombre."' Limit 1";
		$nombre=$this->db->query($sql);	
		if ($nombre->num_rows() > 0)
        {
			return $nombre;
        }else{
            return false;
        }
	}
	function obtenerNombreG($idGrupo){
		$sql = "select * from grupo where cod_grupo = '".$idGrupo."' Limit 1";
		$nombre=$this->db->query($sql);	
		if ($nombre->num_rows() > 0)
        {
			return $nombre;
        }else{
            return false;
        }
	}
	
}
?>