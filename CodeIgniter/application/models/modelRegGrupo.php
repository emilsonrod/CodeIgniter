<?php

class ModelRegGrupo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    function getGrupos(){
    	//los grupos se lo realizara con la descrimiacion si esta libre y abilitado
    	$sql="SELECT cod_grupo,nombre_corto  FROM grupo where activo=1";
		$query = $this->db->query($sql);

		return $query;
		
    }
	function SaveForm($form_data)
	{
		$sql="SELECT count(integrantes_grupo.cod_grupo) as integrantes FROM integrantes_grupo WHERE integrantes_grupo.cod_grupo=".$form_data['grupo'];
		$integrantes=$this->db->query($sql);
		$row = $integrantes->row();//cuando solo esperamos una fila 
		$num= $row->integrantes;		
		
		if($num<5){
			//si es menor agregara al grupo
			$form['cod_grupo']=$form_data['grupo'];			
			$form['id_usuario']=$form_data['id_user'];
			$this->db->insert('integrantes_grupo', $form);	
			
				
			if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		}		
		
		
		return FALSE;
	}
	function correctoPass($name='',$pass='') {
        return $this->db->get_where('grupo', array('nombre_corto' => $name,'passw' => $pass))->row();
    }
	
}
?>