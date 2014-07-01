<?php

class Historia_usuario extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }
    function getHitos2($integrante='')
  { 
        $sql="SELECT cod_grupo as grupo FROM integrantes_grupo WHERE id_usuario=".$integrante;
    $query = $this->db->query($sql);
        if ($query->num_rows() >0)
        {   $row = $query->row();
            $historias=$this->db->query("SELECT nombre_hito FROM hito WHERE cod_grupo=".$row->grupo);
             $arreglo=array();
           if($historias->num_rows()>0){
               
                foreach ($historias->result() as $valor)
            {
            $arreglo[]=$valor->nombre_hito;
                }
                return $arreglo;
           }
           return $arreglo;
        }else{
           return false;
        }      
    
  }
    
    function agregarNuevoHito($integrante='',$hito=''){
       $grupoUsuario=$this->db->query("SELECT cod_grupo FROM integrantes_grupo WHERE id_usuario=".$integrante);
        if($grupoUsuario->num_rows()>0){
           $fila=$grupoUsuario->row();          
           $data=array(
                       'cod_grupo'=>$fila->cod_grupo,
                       'nombre_hito'=>$hito,
                        'nota_final'=>0);
           $this->db->insert('hito',$data);           
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
    function getHitos($id=''){
         $sql="SELECT cod_grupo as grupo FROM integrantes_grupo WHERE id_usuario=".$id;
         $query = $this->db->query($sql);
        if ($query->num_rows() >0)
        {   $row = $query->row();
            $hitos=$this->db->query("SELECT id_hito,nombre_hito FROM hito WHERE cod_grupo=".$row->grupo);
             $arreglo=array();
           if($hitos->num_rows()>0){
               
                foreach ($hitos->result() as $valor)
            {
            $arreglo[$valor->id_hito]=$valor->nombre_hito;
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
    function nuevaHistoria($historia='',$hito='',$integrante='',$responsable){
        /*$id_histo=$this->db->query("select id_historia from historia_usuario where nom_historia='".$histo."' and id_usuario=".$integrante);
        */
          $grupo=$this->db->query("select cod_grupo from integrantes_grupo where id_usuario=".$integrante);
               if($grupo->num_rows()>0){
                   $data=array('id_hito'=>$hito,
                        'cod_grupo'=>$grupo->row()->cod_grupo,
                        'responsable'=>$responsable,       
                     'nom_historia'=>$historia,
                     'evaluacion_est'=>'0',
                     'evaluacion_doc'=>'0');
                    $this->db->insert('historia_usuario',$data); 
                   //$idtarea=$this->db->query("select id_tarea from tarea where nom_tarea='".$historia."' and id_historia=".$histo);
                
               }
       return ($this->db->affected_rows() == '1');
        
    }
    function getTareasHistoria($hito='',$integrante=''){
         
            $listaTareas=$this->db->query("select nom_historia, responsable from historia_usuario where id_hito=".$hito);
             $listaTar=array();
             if($listaTareas->num_rows()>0){
                 foreach($listaTareas->result() as $fila){
                     $responsable=$this->db->query("select nombre,apellidoP,apellidoM from usuario where id_usuario=".$fila->responsable);
                     $user=$responsable->row();
                     $listaTar[]=(array('historia'=>$fila->nom_historia,'responsable'=>$user->apellidoP." ".$user->apellidoM." ".$user->nombre));
                 }
                 
             }return $listaTar; 
         
    }
    function getResponsables($integrante=''){
         
        $grupo=$this->db->query("select cod_grupo from integrantes_grupo where id_usuario=".$integrante)->row();
        $hitos=$this->db->query("select id_hito,nombre_hito from hito where cod_grupo=".$grupo->cod_grupo);
        
        $responsables=array();
        if($hitos->num_rows()>0){
            foreach($hitos->result() as $fila){
                $historias=$this->db->query("select responsable,nom_historia from historia_usuario where id_hito=".$fila->id_hito."  and                                                 cod_grupo=".$grupo->cod_grupo);
                    $listaHistorias=array();
                foreach($historias->result() as $histo){    
                    $responsable=$this->db->query("select nombre,apellidoP,apellidoM from usuario where id_usuario=".$histo->responsable)->row();
                    $listaHistorias[]=(array('historia'=>$histo->nom_historia,'responsable'=>$responsable->apellidoP." ".$responsable->apellidoM." ".$responsable->nombre));
                }
                $responsables[$fila->nombre_hito]=$listaHistorias;
            }
            return $responsables;
        }else{return false;}
        
    }
    
    function getHitosDoc($grupo=''){
          $hitos=$this->db->query("select id_hito,nombre_hito,nota_final from hito where cod_grupo=(select cod_grupo from grupo where         nombre_corto='".$grupo."')");         
        $responsables=array();
        if($hitos->num_rows()>0){
            foreach($hitos->result() as $fila){
                $historias=$this->db->query("select responsable,nom_historia from historia_usuario where id_hito=".$fila->id_hito."  and    cod_grupo=(select cod_grupo from grupo where  nombre_corto='".$grupo."')");
                    $listaHistorias=array();
                foreach($historias->result() as $histo){    
                    $responsable=$this->db->query("select nombre,apellidoP,apellidoM from usuario where id_usuario=".$histo->responsable)->row();
                    $listaHistorias[]=(array('historia'=>$histo->nom_historia,'responsable'=>$responsable->apellidoP." ".$responsable->apellidoM." ".$responsable->nombre));
                }
                $responsables[$fila->id_hito]=(array('nombre'=>$fila->nombre_hito,'nota'=>$fila->nota_final,'historias'=>$listaHistorias));
            }
            return $responsables;
        }else{return false;}     
        
    
    }
    
    function actalizarNotaHito($id_hito='',$nota=''){
        $this->db->where('id_hito',$id_hito);
    $data=array('nota_final'=>intval($nota));
    $this->db->update('hito',$data);
    if($this->db->affected_rows()=='1')
    { return true;}
    return false;
    }
    
    /*
                        SELECT t.nom_tarea,u.id_usuario,u.apellidoP,u.apellidoM,u.nombre FROM responsable_tarea rt,usuario u,tarea t   WHERE t.id_historia=21 and t.id_tarea=rt.id_tarea and rt.id_usuario=u.id_usuario
        $historias=$this->db->query("select id_historia,nom_historia,responsable from historia_usuario  where cod_grupo = (select                                               cod_grupo from integrantes_grupo where id_usuario=".$id.")");        
                */
}
?>