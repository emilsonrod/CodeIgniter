<?php
class ModelRegister extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function addUsersStudent($nombre, $apellidos, $loggin, $passw,$correo)
	{
		$data = array(
						'nombre' => $nombre,
						'apellidos' => $apellidos,
						'loggin' => $loggin,
						'passw' => $passw,
						'correo' => $correo,
						);
		$this->db->insert('usuario',$data);
		$this->db->select('id_usuario');
		$this->db->from('usuario');
		$this->db->where('loggin',$loggin);
		$this->db->where('passw',$passw);
		$query= $this->db->get();
		$IdUsuari = $query->row();


		$aux = 'estudiante';
		$this->db->select('id_rol');
		$this->db->from('rol');
		$this->db->where('nombre_rol',$aux);
		$query2 = $this->db->get();
		$IdRol = $query2->row();

		$data2 = array('id_rol' => $IdRol->id_rol,
					  'id_usuario' => $IdUsuari->id_usuario,);
		return $this->db->insert('rol_usuario',$data2);
	}
	public function addUsersDocente($nombre, $apellidos, $loggin, $passw,$correo)
	{
		$data = array(
						'nombre' => $nombre,
						'apellidos' => $apellidos,
						'loggin' => $loggin,
						'passw' => $passw,
						'correo' => $correo,
						);
		$this->db->insert('usuario',$data);
		$this->db->select('id_usuario');
		$this->db->from('usuario');
		$this->db->where('loggin',$loggin);
		$this->db->where('passw',$passw);
		$query= $this->db->get();
		$IdUsuari = $query->row();


		$aux = 'docente';
		$this->db->select('id_rol');
		$this->db->from('rol');
		$this->db->where('nombre_rol',$aux);
		$query2 = $this->db->get();
		$IdRol = $query2->row();

		$data2 = array('id_rol' => $IdRol->id_rol,
					  'id_usuario' => $IdUsuari->id_usuario,);
		return $this->db->insert('rol_usuario',$data2);
	}
}
?>