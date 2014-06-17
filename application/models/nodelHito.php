<?php
class NodelHito extends CI_Model {

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


			$form['id_usuario']=$form_data['docente'];
			$form['nombre_largo']=$form_data['nombreLargo'];
			$form['nombre_corto']=$form_data['nombreCorto'];
			$form['passw_grupo']=$form_data['contrasenya'];
			$this->db->insert('grupo',$form);

		if ($this->db->affected_rows() == '1')
		{

			return TRUE;
		}

		return FALSE;
	}
	function getHito($grupo){
		$sql="select e.id_entrega,nombre_entrega,fecha_entrega, n.calificacion
			  from entrega e, grupo g, evento ev , tipo_evento tp ,nota n
			  where ev.id_evento= e.id_evento and g.cod_grupo= e.cod_grupo and g.nombre_corto='".$grupo."'
			   and ev.id_tipo_evento=tp.id_tipo_evento and nombre_tipo_evento='hito' and n.id_entrega=e.id_entrega";
		$query=$this->db->query($sql);
        $hito=array();
        foreach($query->result_array() as $fila){
            $hito[$fila['id_entrega']]=(array('NombreEntrega'=>$fila['nombre_entrega'],'FechaEntrega'=>$fila['fecha_entrega'],'nota'=>$fila['calificacion']));
        }
    return $hito;

	}
	 function getDocentes()
	{ 
        $sql="SELECT u.id_usuario,u.nombre,u.apellidoP,u.apellidoM  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);
        $arreglo =array();
        $arreglo['']="Elige tu Docente";
        foreach ($query->result_array() as $row)
		{
				$arreglo[$row['id_usuario']]=$row['nombre'].' '.$row['apellidoP'].' '.$row['apellidoM'] ;
    	}
		return $arreglo;
	}
    function mostrarDocentes(){
		$sql="SELECT u.nombre,u.apellidoP,u.apellidoM  FROM usuario u,rol_usuario ru,rol r
			where r.nombre_rol='docente' and r.id_rol=ru.id_rol and ru.id_usuario = u.id_usuario";
		$query = $this->db->query($sql);

		return $query;
	}
    function actualizarNotaHito($id_entrega='',$calificacion=''){
        $this->db->where('id_entrega',$id_entrega);
		$data=array('calificacion'=>intval($calificacion));
		$this->db->update('nota',$data);
		if($this->db->affected_rows()=='1')
		{	return true;}
		return false;
    }
}
?>
