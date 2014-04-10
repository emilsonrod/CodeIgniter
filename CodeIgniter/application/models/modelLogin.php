<?php
class ModelLogin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function logginUser($username,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('loggin',$username);
		$this->db->where('passw',$password);
		$query= $this->db->get();
		if($query->num_rows() > 0)
		{
			return True;
		}
		else
		{
			return False;
		}
	}
}
?>