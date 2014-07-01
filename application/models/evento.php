<?php

class Evento extends CI_Model {

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

	function insertEvento($form_data)
	{
			
			$this->db->insert('evento',$form_data);

		if ($this->db->affected_rows() == '1')
		{	$sql=("select nombre_tipo_evento as hito from tipo_evento where id_tipo_evento='".$form_data['id_tipo_evento']."'");
			$query=$this->db->query($sql)->row();
			if('hito'==$query->hito){
				$grupo=$this->db->query("select cod_grupo from integrantes_grupo where id_usuario=".$form_data['id_usuario'])->row();
				$evento=$this->db->query("select id_evento,aviso from evento 
					where  aviso='".$form_data['aviso']."' and id_usuario=".$form_data['id_usuario'])->row();
				$this->db->insert('evento_particular',array('id_evento'=>$evento->id_evento ,'cod_grupo'=>$grupo->cod_grupo ));
				if ($this->db->affected_rows() == '1'){
					$data=array('cod_grupo'=>$grupo->cod_grupo,
						        'id_evento'=>$evento->id_evento,
					    	    'nombre_hito'=>$evento->aviso,
					        	'nota_final'=>0);
					$this->db->insert('hito',$data);
				}

			}
			return TRUE;
		}

		return FALSE;
	}
}
?>