<?php
class ModelLogin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}	
	function getUser($username='', $password='') {
        return $this->db->get_where('usuario', array('loggin' => $username,'passw' => $password))->row();
    }
	function isLogged(){
		if (isset($this->session->userdata['usuario'])) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getTareas($rol=''){
		$sql="SELECT f.nombre_form as tarea,f.controlador  FROM formulario f,rol_formulario rf,rol r WHERE r.nombre_rol='".$rol."' and                    r.id_rol=rf.id_rol and rf.id_form=f.id_form";
		$tareas=$this->db->query($sql);	
		$arreglo=array();
		foreach ($tareas->result_array() as $row)
				{
					$arreglo[$row['controlador']]=$row['tarea'];
   					 
				}
		return $arreglo;
	}
	public function getRol($username=''){
		$sql="SELECT r.nombre_rol as perfil FROM usuario u,rol r,rol_usuario ru WHERE u.loggin='".$username."' and u.id_usuario=ru.id_usuario and ru.id_rol=r.id_rol";
		$rol=$this->db->query($sql);
		return $rol->row();
			
	}
	function getId($username=''){
		$sql="Select id_usuario from usuario where loggin='".$username."'";
		$query=$this->db->query($sql);
		return $query->row()->id_usuario;
	}	
}
?>