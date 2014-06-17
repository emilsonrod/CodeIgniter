<?php

class ModelDatos extends CI_Model {

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
	function getGrupos($grupo){

		$sql="select nombre_corto from grupo where activo=1 and nombre_corto='".$grupo."'";
		$grupo=$this->db->query($sql);
		return $grupo->row()->nombre_corto;
	}
	function getNombreLargo($grupo)
	{
		//averiguar como el resultado de la consulta se buelva un texto y muestre en la vista
		$sql= "select nombre_largo from grupo where nombre_corto='".$grupo."'";
		$nombre= $this->db->query($sql);
		return $nombre->row()->nombre_largo;
	}
}

?>