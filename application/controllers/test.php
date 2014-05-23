<?php
class Test extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('modelRegGrupo');
        $this->load->model('modelLogin');
    }
    function index(){
        $this->correctPasword();
        $this->inscrito();
        $this->rol();
    }
    function correctPasword(){
        
        $resultado=$this->modelRegGrupo->correctoPass('Jhonc','frutiga');
        echo $this->unit->run($resultado,'is_false','no es correcto la contraseña');
        
        $resultado1=$this->modelRegGrupo->correctoPass('carlita','AAaa11');        
        echo $this->unit->run($resultado1,'is_true','es correcto el logueo');
        
        $resultado1=$this->modelRegGrupo->correctoPass('linma','AAaa11');        
        echo $this->unit->run($resultado1,'is_true','es correcto el logueo');
        
        $resultado2=$this->modelRegGrupo->correctoPass('Jhon','AAaa77');
        echo $this->unit->run($resultado2,'is_false','no es correcto username');
    }
    function inscrito(){
        $resultado=$this->modelRegGrupo->inscrito(5);
        echo $this->unit->run($resultado,'is_true','registrado por Id buscando');
        
        $resultado=$this->modelRegGrupo->inscrito(35);
        echo $this->unit->run($resultado,'is_false','no registrado por id buscando');
        
    }
    function rol(){
        $resultado=$this->modelLogin->getRol('marquito')->perfil;
        $resultado1=$this->modelLogin->getRol('polal21')->perfil;
        $resultado2=$this->modelLogin->getRol('serL')->perfil;
        $resultado3=$this->modelLogin->getRol('linma')->perfil;
        $resultado4=$this->modelLogin->getRol('ririo')->perfil;
        
        echo $this->unit->run($resultado,'docente','perfil de docente');
        echo $this->unit->run($resultado1,'docente','perfil de docente');
        echo $this->unit->run($resultado2,'docente','perfil de docente');
        echo $this->unit->run($resultado3,'estudiante','perfil de estudiante');
        echo $this->unit->run($resultado4,'estudiante','perfil de estudiante');
    }
}
