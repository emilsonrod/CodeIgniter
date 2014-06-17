<?php

class Csv_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function get_addressbook() { 
        $sql = "SELECT nombre,apellidoM,apellidoP,correo  FROM usuario us, rol_usuario ru where us.id_usuario=ru.id_usuario AND id_rol=2"; 
        /*$this->db->select('nombre,apellidoM,apellidoP,correo'); 
        $this->db->from('usuario');
        $this->db->from('rol_usuario');
        $this->db->where('usuario.id_usuario','rol_usuario.id_usuario');
        $this->db->where('id_rol',2); */ 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    
    function insert_csv($data) {
        $this->db->insert('usuario', $data);
    }
}
/*END OF FILE*/
