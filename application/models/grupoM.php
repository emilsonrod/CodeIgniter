<?php

class GrupoM extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

      /**
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{


			$form['id_usuario']=$form_data['docente'];
			$form['nombre_largo']=$form_data['nombreLargo'];
			$form['nombre_corto']=$form_data['nombreCorto'];
			$form['passw_grupo']=$form_data['contrasenya'];
			$this->db->insert('grupo',$form);

		if ($this->db->affected_rows() == '1')
		{

			return TRUE;
		}

		return FALSE;
	}
	function getDocentes()
	{ $sql='SELECT u.id_usuario,u.nombre,u.apellidos  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol=\'docente\' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario';
		$query = $this->db->query($sql);

		return $query;
	}
	function getGrupos(){
		$id=$this->session->userdata('id');
		$sql="select cod_grupo,nombre_corto from grupo where activo=1 and id_docente=".$id;
		$grupos=$this->db->query($sql);
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['cod_grupo']]=$row['nombre_corto'];

				}

		return $arreglo;
	}

	function getIntegrantes($grupo){
		$sql="select u.nombre,u.apellidopaterno,u.apellidomaterno  from usuario u,grupo g,integrantes_grupo ig
			where u.id_usuario=ig.id_usuario and ig.cod_grupo=g.cod_grupo and g.nombre_corto='".$grupo."'";
		return $this->db->query($sql);
	}
	function getNombreLargo($grupo)
	{
		//averiguar como el resultado de la consulta se buelva un texto y muestre en la vista
		$sql= "select nombre_largo from grupo where nombre_corto='".$grupo."'";
		$nombre= $this->db->query($sql);

		$nombreLargo=$nombre->row()->nombre_largo;
		return $nombreLargo;
	}
	function getDocumentosGrupo($grupo){
		$sql="select nombre_doc from documentos d, grupo g,documentos_grupo docg
			where d.cod_documen= docg.cod_documen and g.cod_grupo= docg.cod_grupo and g.nombre_corto='".$grupo."'";
		return $this->db->query($sql);

	}
}
?>
