<?php
/**
* 
*/
class ModelSubirDoc extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//METODO QUE SIRVE PARA REGISTRAR DOCUMENTOS
	function agregarDoc($id, $COD, $nombre, $descripcion, $tipo, $estado,$fecha)
	{
		$Datos = array('ID_USUARIO' =>$id,
					   'COD_GRUPO' =>$COD,
					   'NOMBRE_DOC' =>$nombre,
					   'DESCRIPCION' => $descripcion,
					   'TIPO' => $tipo,
					   'ESTADO' => $estado,
					   'FECHA' => $fecha,
					   );
		$this->db->insert('documentos', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//METODO QUE OBTINE TODOS LOS DOCUMENTOS SUBIDOS
	function verLista()
	{
		$query = $this->db->get('documentos');
		if($query ->num_rows() > 0)
		{
			return $query;
		}
		else{
			return FALSE;
		}
	}
	
	//CONSULTA ARCHIVO POR ID
	function consultarDoc($idArchivo)
	{
		$this->db->select('*');
		$this->db->from('documentos');
		$this->db->where('COD_DOCUMEN',$idArchivo);
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
		$this->db->where('COD_DOCUMEN',$idArchivo);
		$this->db->delete('documentos');

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//CONSULTAR TODO CON EL COD DE GRUPO
	function consultarAll($cod_grupo)
	{
		$this->db->select('*');
		$this->db->from('documentos');
		return $this->db->get(); 
	}
	/*--------------------conseguir el grupo del q subio el doc--------------------*/
	function getIdGrupo($id)
	{
		$sql="select COD_GRUPO from integrantes_grupo where ID_USUARIO='".$id."'";
		$consulta = $this->db->query($ql);
		$fila = $consulta->row();
		return $fila->cod_grupo;
	}

	/*-----------------*/
	function getCodGrupos($id)
	{
		$sql="select * from integrantes_grupo where id_usuario=".$id;
		$grupos=$this->db->query($sql);	
		
		return $grupos;		
	}

	function getDocGrupo($id)
	{
		$sql="select * from documentos where id_usuario='".$id."' order by cod_documen desc limit 1";
		$grupos=$this->db->query($sql);	
		
		return $grupos;		
	}
	function insertaDocGrupo($id_fecha, $id_doc, $id_grupo)
	{
		$Datos = array( 'ID_FECHA' => $id_fecha,
						'COD_DOCUMEN' => $id_doc,
						'COD_GRUPO' =>$id_grupo
					   );
		$this->db->insert('documentos_grupo', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getDocumentosGrupo($grupo){
		$sql="select * from documentos 
			where cod_grupo='".$grupo."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}	

		//return $this->db->query($sql);
	}
	function getDocumentosGrupoFecha($grupo)
	{
		$sql="select DISTINCT d.cod_documen, d.nombre_doc, d.descripcion, d.tipo, d.estado, d.fecha, fl.comentario from documentos d, documentos_grupo dg, fecha_limite fl
			where dg.cod_grupo='".$grupo."' and  d.cod_grupo = dg.cod_grupo and dg.id_fecha = fl.id_fecha";

		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}	
		
	}
	function getDocumentosDoc($id_usuario){
		$sql="select * from documentos 
			where id_usuario='".$id_usuario."'";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}	
		//return $this->db->query($sql);
		
	}
	function rolUsuario($id_usuario)
	{
		$sql = "select * from rol_usuario where id_rol='1' and id_usuario='".$id_usuario."'";

		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	//VERIFICA SI HAY UNA FECHA LIMITE PARA LA ENTREGA DEL DOCUEMENTO
	function  verificarFecha()
	{
		$sql = "select * from fecha_limite where fecha >= current_date order by fecha limit 1";
		$consulta = $this->db->query($sql);

		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
		
	}
	function verificarArchivoSubido($fecha)
	{
		$sql = "select * from fecha_limite where fecha <= '".$fecha."' order by fecha desc limit 1";
		$consulta = $this->db->query($sql);
		if($consulta ->num_rows() > 0)
		{
			return $consulta;
		}
		else{
			return FALSE;
		}
	}
	//actualizar la base de datos de los documentos para verificar que despues de la fecha de entrega se desabilite la opcion eliminar

	function actualizarEstadoDoc($fecha)
	{
		$sql ="UPDATE documentos SET ESTADO = 0 WHERE FECHA = current_date ";
	}
}