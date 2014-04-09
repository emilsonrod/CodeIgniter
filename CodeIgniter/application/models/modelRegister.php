<?php
class ModelRegister extends CI_model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function addUsers($nombre, $apellidos, $loggin, $passw,$correo)
	{
		//$this->db->query('Insert into usuarios values("")')
		$data = array(
						'nombre' => $nombre,
						'apellidos_paterno' => $apellidos,
						'loggin' => $loggin,
						'passw' => $passw,
						'correo' => $correo,
						);
		$this->db->insert('usuario',$data);
	}
}
?>