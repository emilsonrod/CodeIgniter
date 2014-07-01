<?php
class ModelRegister extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function addUsersStudent($nombre, $apellidoP, $apellidoM, $loggin, $passw,$correo)
	{
		$data = array(
						'nombre' => $nombre,
						'apellidoP' => $apellidoP,
						'apellidoM' => $apellidoM,
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
	public function addUsersDocente($nombre, $apellidoP, $apellidoM, $loggin, $passw,$correo,$ciDocente,$grupoDocente)
	{
		$data = array(
						'nombre' => $nombre,
						'apellidop' => $apellidoP,
						'apellidom' => $apellidoM,
						'loggin' => $loggin,
						'passw' => $passw,
						'correo' => $correo,
						'ci_docente' => $ciDocente,
						'grupoDocente' => $grupoDocente,
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
