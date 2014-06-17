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
			//$res=0;

		if ($this->db->affected_rows() == '1')
		{

			return TRUE;
		}

		return FALSE;
	}
	function getDocentes()
	{ $sql='SELECT u.id_usuario,u.nombre,u.apellidop,u.apellidom  FROM usuario u,rol_usuario ru,rol r
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

	public function getVerGrupos(){
		$sql="select f.nombre_form as tarea,f.controlador FROM formulario f,rol_formulario rf,rol r WHERE r.id_rol=6 and  r.id_rol=rf.id_rol and rf.id_form=f.id_form";
		$tareas=$this->db->query($sql);
		$arreglo=array();
		foreach ($tareas->result_array() as $row)
				{
					$arreglo[$row['controlador']]=$row['tarea'];

				}
		return $arreglo;
	}

	function getIntegrantes($grupo){
		$sql="select u.nombre,u.apellidop,u.apellidom  from usuario u,grupo g,integrantes_grupo ig
			where u.id_usuario=ig.id_usuario and ig.cod_grupo=g.cod_grupo and g.nombre_corto='".$grupo."'";
		return $this->db->query($sql);
	}
	function getId($grupo){
		$sql="select cod_grupo from grupo where nombre_corto='".$grupo."'";
		$codgrupo=$this->db->query($sql);
		$codgrupo->row()->cod_grupo;
		$res=$codgrupo;
		return $res;
	}
	/*function getDocumentosGrupo($grupo){
		$sql="select nombre_entrega from entrega e, grupo g, evento ev , tipo_evento tp
			where ev.id_evento= e.id_evento and g.cod_grupo= e.cod_grupo and g.nombre_corto='".$grupo."' and ev.id_tipo_evento=tp.id_tipo_evento";
		return $this->db->query($sql);

	}*/
}
?>
