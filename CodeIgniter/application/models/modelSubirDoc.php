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
	function agregarDoc($nombre_Doc, $descripcion, $tipo, $estado,$fecha)
	{
		$Datos = array('NOM_DOCUM' =>$nombre_Doc,
					   'DESCRIPCION' => $descripcion,
					   'TIPO' => $tipo,
					   'ESTADO' => $estado,
					   'FECHA' => $fecha
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
	function consultarAll()
	{
		$this->db->select('*');
		$this->db->from('documentos');
		return $this->db->get();
	}
}