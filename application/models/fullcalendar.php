<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fullcalendar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    /**
    * lee los eventos de base de datos
    * y los entrega en formato json
    ****
    * @access public
    * @param none
    * @return json events
    */
   
    public function jsonEvents()
    {
       
        $events = $this->db->get('evento')->result();
       
        $jsonevents = array();
        foreach ($events as $entry)
        {
            $jsonevents[] = array(
                'id'        => $entry->id_evento,
                'title'     => $entry->aviso,
                'start'     => $entry->inicio,
                'allDay'    => true,
                'end'       => $entry->fecha_evento
                //'url'       => $entry->url,
            );
        }
        return json_encode($jsonevents);
    }
 
    /**
    * Cambia la fecha de un evento en la base de datos
    *
    ****
    * @access public
    * @param $data
    * @return string con el último query (esto debe ser anulado en producción)
    */
    public function drop_event($data)
    {
        extract($data);
        $new_event = array(
            'start' =>  $daystart,
            'end'   =>  $dayend,
        );
       
        $this->db->where('id',$event);
        $this->db->update('eventos',$new_event);
        return $this->db->last_query();
    }
 
    /**
    * Cambia la fechas de un evento en la base de datos
    *
    ****
    * @access public
    * @param $data
    * @return string con el último query (esto debe ser anulado en producción)
    */
    public function resize($data)
    {
        extract($data);
        $new_event = array(
            'start' =>  $daystart,
            'end'   =>  $dayend,
        );
       
        $this->db->where('id',$event);
        $this->db->update('eventos',$new_event);
        return $this->db->last_query();
    }
 
    /**
    * Borra el evento en la base de datos
    *
    ****
    * @access public
    * @param $id (evento)
    * @return string con el último query (esto debe ser anulado en producción)
    */
    public function delete($id)
    {
        if($this->db->delete('eventos',array('id'=>$id))) return true;
        return false;
    }
 
}
 
/* End of file fulcalendar.php */
/* Location: ./application/models/fulcalendar.php */