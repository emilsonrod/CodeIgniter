<?php

class Csv_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function get_addressbook() { 
        $sql = "SELECT nombre,apellidoP,apellidoM,loggin  FROM usuario us, rol_usuario ru where us.id_usuario=ru.id_usuario AND id_rol=2"; 
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
        $sql = "SELECT id_usuario FROM usuario as f where not exists (select * from rol_usuario as d where f.id_usuario=d.id_usuario)";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $fila){
            $aux = 'estudiante';
            $this->db->select('id_rol');
            $this->db->from('rol');
            $this->db->where('nombre_rol',$aux);
            $query2 = $this->db->get();
            $IdRol = $query2->row();

            $data2 = array('id_rol' => $IdRol->id_rol,
                          'id_usuario' => $fila['id_usuario']);
            $query2=$this->db->insert('rol_usuario',$data2);
        }
    }
}
/*END OF FILE*/
