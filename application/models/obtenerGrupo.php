<?php

class ObtenerGrupo extends CI_Model {
function __construct()
	{
		/*maribel*/
		parent::__construct();
	}

	function getGrupo($id){
		/*$sql="select  nombre_corto from grupo ";
		return $this->db->query($sql);	*/
		//los grupos se lo realizara con la descrimiacion si esta libre y abilitado
    	$sql="SELECT cod_grupo,nombre_corto  FROM grupo where activo=1";
		$query = $this->db->query($sql);

		return $query;

	}

}
?>
