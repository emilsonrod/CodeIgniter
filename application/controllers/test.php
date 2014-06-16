<?php
class Test extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('modelLogin');
        $this->load->model('modelUsuario');
    }
    function index(){
        
        $this->rol();
        $this->notaEstudiante();
    }
    function correctPasword(){
        
        $resultado=$this->modelLogin->getUser('Jhonc','frutiga');
        echo $this->unit->run($resultado,'is_false','no es correcto la contrasenia Jhonc');
        
        $resultado1=$this->modelLogin->getUser('carlita','AAaa11');        
        echo $this->unit->run($resultado1,'is_true','es correcto el logueo carlita');
        
        $resultado1=$this->modelLogin->getUser('linma','AAaa11');        
        echo $this->unit->run($resultado1,'is_true','es correcto el logueo linma');
        
        $resultado2=$this->modelLogin->getUser('Jhon','AAaa77');
        echo $this->unit->run($resultado2,'is_false','no es correcto username Jhon');
    }
    function inscrito(){
        $resultado=$this->modelLogin->inscrito(5);
        echo $this->unit->run($resultado,'is_true','registrado por Id buscando');
        
        $resultado=$this->modelLogin->inscrito(35);
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
    function notaEstudiante(){
        $resultado1=$this->modelUsuario->actalizarNotaEstudiantes('13','65');
        $resultado2=$this->modelUsuario->actalizarNotaEstudiantes('45','53');
        
        echo $this->unit->run($resultado1,'is_true','actualizo nota Estudainte correctamente');
        echo $this->unit->run($resultado2,'is_false','no se pudo actualizar');

    }
}
