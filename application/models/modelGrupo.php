<?php

class modelGrupo extends CI_Model {

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


			$form['id_docente']=$form_data['docente'];
			$form['id_representante']=$form_data['representante'];
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
	{ $sql="SELECT u.id_usuario,u.nombre,u.apellidos  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);

		return $query;
	}
	function getGrupos($id){
		$sql="select cod_grupo,nombre_corto from grupo where activo=1 and id_docente=".$id;
		$grupos=$this->db->query($sql);
		$arreglo=array();
		foreach ($grupos->result_array() as $row)
				{
					$arreglo[$row['cod_grupo']]=$row['nombre_corto'];

				}

		return $arreglo;
	}
	function darBaja($grupo){

        $this->db->where('nombre_corto',$grupo);
		$data=array('activo'=>0);
		$this->db->update('grupo',$data);
		if($this->db->affected_rows()=='1')
		{	return true;}
		return false;
	}
	function getIntegrantes($grupo){
		$sql="select u.nombre,u.apellidos  from usuario u,grupo g,integrantes_grupo ig
			where u.id_usuario=ig.id_usuario and ig.cod_grupo=g.cod_grupo and g.nombre_corto='".$grupo."'";
		return $this->db->query($sql);
	}
	function mostrarDocentes(){
		$sql="SELECT u.nombre,u.apellidos  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);

		return $query;
	}
    function creoGrupo($id_representante=''){
        $query= $this->db->query("SELECT nombre_corto FROM grupo WHERE id_representante=".$id_representante);
        if ($query->num_rows() >0)
        {
            return true;
        }else{
            return false;
        }
    }
    function getIdGrupo($grupo=''){
        return $this->db->query("SELECT cod_grupo from grupo where nombre_corto='".$grupo."'")->row()->cod_grupo;
    }


}
?>
