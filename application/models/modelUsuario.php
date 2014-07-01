<?php

class ModelUsuario extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    function getDocentes()
	{ 
        $sql="SELECT u.id_usuario,u.nombre,u.apellidoP,u.apellidoM,u.grupoDocente FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);
        $arreglo =array();
        $arreglo['']="Elige tu Docente";
        foreach ($query->result_array() as $row)
		{
				$arreglo[$row['id_usuario']]=$row['nombre'].' '.$row['apellidoP'].' '.$row['apellidoM'].' '.'Grupo nro-'.' '.$row['grupoDocente'] ;
    	}
		return $arreglo;
	}
    function mostrarDocentes(){
		$sql="SELECT u.nombre,u.apellidoP,u.apellidoM,u.grupoDocente  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);

		return $query;
	}
    function actalizarNotaEstudiantes($id_estudiante='',$nota=''){
        $this->db->where('id_usuario',$id_estudiante);
		$data=array('nota_estudiante'=>intval($nota));
		$this->db->update('nota_estudiante',$data);
		if($this->db->affected_rows()=='1')
		{	return true;}
		return false;
    }
}
?>