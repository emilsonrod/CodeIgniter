<?php

class ModelUsuario extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    function getDocentes()
	{ 
        $sql="SELECT u.id_usuario,u.nombre,u.apellidoP,u.apellidoM  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);
        $arreglo =array();
        $arreglo['']="Elige tu Docente";
        foreach ($query->result_array() as $row)
		{
				$arreglo[$row['id_usuario']]=$row['nombre'].' '.$row['apellidoP'].' '.$row['apellidoM'] ;
    	}
		return $arreglo;
	}
    function mostrarDocentes(){
		$sql="SELECT u.nombre,u.apellidoP,u.apellidoM  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);

		return $query;
	}
}
?>