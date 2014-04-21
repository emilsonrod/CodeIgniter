<?php

class GrupoM extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		$this->db->insert('grupo',$form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	function getDocentes()
	{ 	
		   $this->db->select('usuario.id_usuario','usuario.nombre');
		   $this->db->from('usuario');		   
		   $this->db->from('rol_usuario');
		   $this->db->from('rol');
		   
		   $this->db->where('rol.nombre_rol','docente');
		   $this->db->where('rol.id_rol','rol_usuario.id_rol');		   
		   $this->db->where('rol_usuario.id_usuario','usuario.id_usuario');
		   return $this->db->get();
		
	}
}
?>