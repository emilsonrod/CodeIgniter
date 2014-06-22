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
		return isset($this->session->userdata['usuario']);		
	}

	public function getTareas($id=''){
		$sql="select f.nombre_form as tarea,f.controlador from actividad_usuario au,formulario f where au.id_usuario=".$id." and au.permitido='1' and au.id_form=f.id_form";        
		$tareas=$this->db->query($sql);
		$arreglo=array();
		foreach ($tareas->result_array() as $row)
				{
					$arreglo[$row['controlador']]=$row['tarea'];

				}
            $arreglo['ingresar/cerrarSession']='Salir';
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
    function getTareasGeneral(){
        $tareas=array('docente'=>'Docentes','registrarEstudiante'=>'Registrar Estudiante','registrarDocente'=>'Registra Docente');
        return $tareas;
    }
}
?>
