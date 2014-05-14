<?php

class ModelRegGrupo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    function getGrupos(){
    	//los grupos se lo realizara con la descrimiacion si esta libre y abilitado
    	$sql="SELECT cod_grupo,nombre_corto  FROM grupo where activo=1 and 5>(SELECT count(integrantes_grupo.cod_grupo) FROM integrantes_grupo WHERE integrantes_grupo.cod_grupo=grupo.cod_grupo)";
		$query = $this->db->query($sql);
		return $query;

    }
	function SaveForm($form_data)
	{

			$form['cod_grupo']=$form_data['grupo'];
			$form['id_usuario']=$form_data['id_user'];
			$this->db->insert('integrantes_grupo', $form);
			if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}


		return FALSE;
	}
	function correctoPass($name='',$pass='') {
        return $this->db->get_where('grupo', array('nombre_corto' => $name,'passw_grupo' => $pass))->row();
    }
    function getNombreGrupo($id_grupo=''){
        $query=$this->db->query("SELECT nombre_corto FROM grupo WHERE cod_grupo=".$id_grupo);
		return $query->row()->nombre_corto;
    }
    function inscrito($id=''){
        $query= $this->db->query("SELECT * FROM integrantes_grupo WHERE id_usuario=".$id);
        if ($query->num_rows() >0)
        {
            return true;
        }else{
            return false;
        }
    }

}
?>
