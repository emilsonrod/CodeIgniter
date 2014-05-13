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

		/*
		$sql="select cod_grupo from integrantes_grupo where id_usuario = '".$id_usuario."'";
		$consulta = $this->db->query($ql);
		$fila = $consulta->row();
		return $fila->cod_grupo;*/
	}
	function insertarDocG($id)
	{
		$sql="SELECT cod_documen from documentos where id_usuario='".$id."'";
		$consulta = $this->db->query($ql);
		$fila = $consulta->row();

		$sql1="SELECT cod_grupo from integrantes_grupo where id_usuario='".$id."'";
		$consulta1 = $this->db->query($ql1);
		$fila1 = $consulta1->row();


		$Datos = array('COD_DOCUMEN' =>$fila->cod_documen,
					   'COD_GRUPO' =>$fila1->cod_grupo
				       );
		$this->db->insert('documentos_grupo', $Datos);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function consultarCodG($id_Session)
	{
		$sql="SELECT COD_GRUPO FROM integrantes_grupo WHERE ID_USUARIO ='".$id_Session."'";
		$consulta = $this->db->query($sql);
		$fila = $consulta->row();
		return $fila->cod_grupo;
	}

	
	
	//-----------------------------------------------------------------------------
	function getG($id)
	{
		$sql="select cod_documen,id_usuario from documentos where id_usuario=".$id;
		$grupos=$this->db->query($sql);	
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['id_usuario']]=$row['cod_documen'];
   					 
				}
		
		return $arreglo;		
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
		$sql="select * from documentos where id_usuario=".$id;
		$grupos=$this->db->query($sql);	
		
		
		return $grupos;		
	}
	function insertaDocGrupo($id_doc, $id_grupo)
	{
		$Datos = array( 'ID_FECHA' => '0',
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
		return $this->db->query($sql);
		
	}
	 

}