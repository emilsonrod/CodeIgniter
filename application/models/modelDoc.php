<?php
class ModelDoc extends CI_Model {

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
	function getDocumentoA($grupo){
		$sql="select nombre_entrega ,fecha_entrega 
				from entrega e, grupo g, evento ev , tipo_evento tp
				where ev.id_evento= e.id_evento and g.cod_grupo= e.cod_grupo 
				and g.nombre_corto='".$grupo."' and ev.id_tipo_evento=1 and tp.id_tipo_evento=1 and e.fecha_entrega=ev.fecha_evento";
		return $this->db->query($sql);

	}
	function getDocumentoB($grupo){
		$sql="select nombre_entrega ,fecha_entrega 
				from entrega e, grupo g, evento ev , tipo_evento tp
				where ev.id_evento= e.id_evento and g.cod_grupo= e.cod_grupo 
				and g.nombre_corto='".$grupo."' and ev.id_tipo_evento=2 and tp.id_tipo_evento=2 and e.fecha_entrega=ev.fecha_evento ";
		return $this->db->query($sql);

	}
	function getDocumentoGeneral($grupo){
		$sql="select nombre_entrega ,fecha_entrega,comentario 
				from entrega e, grupo g, evento ev , tipo_evento tp
				where ev.id_evento= e.id_evento and g.cod_grupo= e.cod_grupo 
				and g.nombre_corto='".$grupo."' and ev.id_tipo_evento=5 and tp.id_tipo_evento=5 and e.fecha_entrega=ev.fecha_evento ";
		return $this->db->query($sql);

	}
}
?>