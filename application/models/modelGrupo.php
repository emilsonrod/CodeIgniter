<?php

class ModelGrupo extends CI_Model {

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
			$form['id_representante']=$form_data['integrante'];
			$form['correo_grupo']=$form_data['correo'];
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
    function inscribirseAGrupo($form_data){
            $idGrupo=$this->db->query("SELECT cod_grupo FROM grupo WHERE nombre_corto='".$form_data['nombreCorto']."'");
            $form['cod_grupo']=$idGrupo->row()->cod_grupo;
			$form['id_usuario']=$form_data['integrante'];
			$this->db->insert('integrantes_grupo', $form);
			if ($this->db->affected_rows() == '1')
		    { $tareas=$this->db->query("select id_form,permitido from actividad_usuario where id_usuario=".$form['id_usuario']);
                if($tareas->num_rows()>0){
                    foreach($tareas->result() as $fila){
                        if($fila->permitido=='0'){
                            $this->db->query("update actividad_usuario  set permitido='1' where id_usuario=".$form['id_usuario']." and id_form=".$fila->id_form);
                        }else{
                            $this->db->query("update actividad_usuario  set permitido='0' where id_usuario=".$form['id_usuario']." and id_form=".$fila->id_form);   
                        }
                    }
                }
                
			     return TRUE;
		    }
		return FALSE;
    }
	
	function getGrupos($id){
		//obteniendo los grupos q solo le pertenecen a un docente determinado
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
		$sql="select u.nombre,u.apellidoP,u.apellidoM  from usuario u,grupo g,integrantes_grupo ig
			where u.id_usuario=ig.id_usuario and ig.cod_grupo=g.cod_grupo and g.nombre_corto='".$grupo."'";
		return $this->db->query($sql);
	}
	function getIntegrantesNota($grupo){
        $sql="select u.id_usuario, u.nombre,u.apellidoP,u.apellidoM, ne.nota_estudiante from usuario u,
        grupo g,integrantes_grupo ig,nota_estudiante ne
			where u.id_usuario=ig.id_usuario and u.id_usuario=ne.id_usuario and ig.cod_grupo=g.cod_grupo and g.nombre_corto='".$grupo."'";
        $query=$this->db->query($sql);
        $integrantes=array();
        foreach($query->result_array() as $fila){
            $integrantes[$fila['id_usuario']]=(array('nombre'=>$fila['nombre'],'paterno'=>$fila['apellidoP'],'materno'=>$fila['apellidoM'],'nota'=>$fila['nota_estudiante']));
        }
    return $integrantes;
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
    function gruposCreados(){
        return $this->db->query("SELECT nombre_corto,nombre_largo,correo_grupo from grupo");        
    }
    function listaGrupos(){
    	//los grupos se lo realizara con la descrimiacion si esta libre y abilitado aquellos q tienen menor a 5 integrantes
    	$sql="SELECT cod_grupo,nombre_corto  FROM grupo where activo=1 and 5>(SELECT count(integrantes_grupo.cod_grupo) FROM integrantes_grupo WHERE integrantes_grupo.cod_grupo=grupo.cod_grupo)";
		$query = $this->db->query($sql);        
        $lista=array();
        if($query->num_rows()>0){
        $lista['']="Elige la Empresa";    
			foreach ($query->result_array() as $row)
				{
					$lista[$row['nombre_corto']]=$row['nombre_corto'];
				}
        }
		return $lista;
    }
    function inscritoEnUnaEmpresa($id=''){
        
        $query= $this->db->query("SELECT * FROM integrantes_grupo WHERE id_usuario=".$id);
        if ($query->num_rows() >0)
        {
            return true;
        }else{
            return false;
        }
    }
    function esCorrecto($grupo='',$password=''){
         $query=$this->db->query("SELECT correo_grupo from grupo WHERE nombre_corto='".$grupo."' and passw_grupo='".$password."'");
        if($query->num_rows()==1){
            return true;
        }
        return false;
    }
}
?>
