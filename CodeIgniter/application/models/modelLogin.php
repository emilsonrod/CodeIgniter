<?php
class ModelLogin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function logginUser($username,$password)
	{
		$query = ("SELECT * FROM users WHERE loggin=$username AND passw=$paswword;");
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $fila)
			{
				$data[] = $fila;
			}
			return $data;
		}
		else
		{
			return False;
		}
	}
}

?>