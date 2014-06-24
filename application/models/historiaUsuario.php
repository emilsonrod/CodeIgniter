<?php

class HistoriaUsuario extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
    function getHistorias($integrante='')
	{ 
        $sql="SELECT cod_grupo as grupo FROM integrantes_grupo WHERE id_usuario=".$integrante;
		$query = $this->db->query($sql);
        if ($query->num_rows() >0)
        {   $row = $query->row();
            $historias=$this->db->query("SELECT nom_historia FROM historia_usuario WHERE cod_grupo=".$row->grupo);
             $arreglo=array();
           if($historias->num_rows()>0){
               
                foreach ($historias->result() as $valor)
		        {
				    $arreglo[]=$valor->nom_historia;
                }
                return $arreglo;
           }
           return $arreglo;
        }else{
           return false;
        }      
		
	}
    
    function agregarNuevaHistoria($integrante='',$historia=''){
       $grupoUsuario=$this->db->query("SELECT cod_grupo FROM integrantes_grupo WHERE id_usuario=".$integrante);
        if($grupoUsuario->num_rows()>0){
           $fila=$grupoUsuario->row();
           $tipoHito=$this->db->query("SELECT id_tipo_evento as hito FROM tipo_evento WHERE nombre_tipo_evento='hito'")->row();
           $data=array('id_tipo_evento'=>$tipoHito->hito,
                       'cod_grupo'=>$fila->cod_grupo,
                       'id_usuario'=>$integrante,
                       'nom_historia'=>$historia);
           $this->db->insert('historia_usuario',$data);           
		   if ($this->db->affected_rows() == '1'){
			 return TRUE;
		   }else{ 
             return false;
           }
       }else{
           return false;
       }        
    }
    function noRepetido($histori='',$id=''){
        $query = $this->db->query("SELECT nom_historia FROM historia_usuario WHERE 
        cod_grupo=(SELECT cod_grupo from integrantes_grupo where id_usuario=".$id.") and nom_historia='".$histori."'");
        if ($query->num_rows() >0){
            return false;
        }else{return true;}
    }
    function asignarTareasHistorias($id=''){
         $sql="SELECT cod_grupo as grupo FROM integrantes_grupo WHERE id_usuario=".$id;
         $query = $this->db->query($sql);
        if ($query->num_rows() >0)
        {   $row = $query->row();
            $historias=$this->db->query("SELECT id_historia,nom_historia FROM historia_usuario WHERE cod_grupo=".$row->grupo);
             $arreglo=array();
           if($historias->num_rows()>0){
                $arreglo['']="Elegir Historia";
                foreach ($historias->result() as $valor)
		        {
				    $arreglo[$valor->id_historia]=$valor->nom_historia;
                }
                return $arreglo;
           }
           return $arreglo;
        }else{
           return false;
        }
    }
    
    function getEquipo($id=''){
        $sql=$this->db->query("SELECT cod_grupo as grupo FROM integrantes_grupo WHERE id_usuario=".$id);
         $sql2="SELECT  u.id_usuario,u.nombre,u.apellidoP,u.apellidoM FROM integrantes_grupo ig,usuario u WHERE ig.id_usuario=u.id_usuario                            and ig.cod_grupo='".$sql->row()->grupo."'";
		$query = $this->db->query($sql2);
        if ($query->num_rows() >0)
        {  
           
             $arreglo=array(''=>'Elegir Responsable');           
               
                foreach ($query->result() as $valor)
		        {
				    $arreglo[$valor->id_usuario]=$valor->apellidoP." ".$valor->apellidoM." ".$valor->nombre;
                }
            
           
           return $arreglo;
        }else{
           return false;
        }      
    }
    function nuevaTareaHistoria($tarea='',$histo='',$integrante='',$responsable){
        /*$id_histo=$this->db->query("select id_historia from historia_usuario where nom_historia='".$histo."' and id_usuario=".$integrante);
        */
         $data=array('id_historia'=>$histo,
                     'nom_tarea'=>$tarea,
                     'evaluacion_est'=>'0',
                     'evaluacion_doc'=>'0');
         $this->db->insert('tarea',$data);           
		   if ($this->db->affected_rows() == '1'){
               $grupo=$this->db->query("select cod_grupo from integrantes_grupo where id_usuario=".$integrante);
               if($grupo->num_rows()>0){
                   $idtarea=$this->db->query("select id_tarea from tarea where nom_tarea='".$tarea."' and id_historia=".$histo);
                       $data2=array('cod_grupo'=>$grupo->row()->cod_grupo,
                                     'id_usuario'=>$responsable,
                                    'id_tarea'=>$idtarea->row()->id_tarea,
                                    'id_historia'=>$histo);
                     $this->db->insert('responsable_tarea',$data2);
               }
			 return true;
		   }else{ 
             return false;
           }        
        
    }
    function getTareasHistoria($histo,$integrante=''){
         
            $listaTareas=$this->db->query("select nom_tarea from tarea where id_historia=".$histo);
             $listaTar=array();
             if($listaTareas->num_rows()>0){
                 foreach($listaTareas->result() as $fila){
                     $listaTar[]=$fila->nom_tarea;
                 }
                 
             }return $listaTar; 
         
    }
    function getResponsables($id=''){
        $historias=$this->db->query("select id_historia,nom_historia from historia_usuario  where cod_grupo = (select cod_grupo from                  integrantes_grupo where id_usuario=".$id.")");
        $responsables=array();
        if($historias->num_rows()>0){
            foreach($historias->result() as $fila){
                $tareasA=$this->db->query("SELECT t.nom_tarea,u.apellidoP,u.apellidoM,u.nombre FROM responsable_tarea rt,usuario u,tarea t   WHERE t.id_historia=".$fila->id_historia." and t.id_tarea=rt.id_tarea and rt.id_usuario=u.id_usuario");
                    echo $fila->id_historia."***";
                if($tareasA->num_rows()>0){                    
                        $tareaRespon=array();
                    foreach($tareasA->result() as $tareas){
                        echo $tareas->nom_tarea."--";
                        $tareaRespon[$tareas->nom_tarea]=$tareas->apellidoP." ".$tareas->apellidoM." ".$tareas->nombre;                
                    }
                    $responsables[$fila->nom_historia]=$tareaRespon;
                }               
            }
            return $responsables;
        }else{return false;}
        
    }
    /*
                        SELECT t.nom_tarea,u.id_usuario,u.apellidoP,u.apellidoM,u.nombre FROM responsable_tarea rt,usuario u,tarea t   WHERE t.id_historia=21 and t.id_tarea=rt.id_tarea and rt.id_usuario=u.id_usuario
                
                */
}
?>