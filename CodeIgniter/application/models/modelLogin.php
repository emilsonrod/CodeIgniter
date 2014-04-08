<?php
class ModelLogin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($username,$password)
	{
		$query = $this->db->where('Usuario',$email);   //   La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
      	$query = $this->db->where('Password',$password);
      	$query = $this->db->get('Usuarios');
      	return $query->row();
	}
}

?>