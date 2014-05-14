<?php

class Csv_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function get_addressbook() {  
        $this->db->select('nombre,apellidos,loggin,correo');   
        $query = $this->db->get('usuario');
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
