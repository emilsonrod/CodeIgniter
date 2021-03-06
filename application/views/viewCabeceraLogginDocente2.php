<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" /> 
    
    <link rel="shortcut icon" href="./assets/ico/favicon.ico">

    <title>Sistema de ayuda a TIS</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
    <link href="./css/carousel.css" rel="stylesheet">
    <script type="text/javascript" src="./js/validaciones.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
               <li><a class="navbar-brand " href="csv">Importar Csv de Estudiantes</a></li>
               <li><a class="navbar-brand " href="subirDocDocente">Subir Documentos</a></li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupos <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="controladorVerGrupo">Elegir Grupo-Empresa</a></li>
                    <li><a href="listaGrupos">Eliminar Grupo-Empresa</a></li>      
                  </ul>
                </li> 
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eventos<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="eventoDocenteC">Crear Evento</a></li>
                    <li><a href="calendarEvento">Ver Eventos </a></li>      
                  </ul>
                </li>   
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entregas de Grupos <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="controladorHito">Calificar Hitos</a></li>
                    <li><a href="controladorDoc">Documentos</a></li> 
                    <!--<li><a href="integrantes">Integrantes</a></li> -->
                    <li><a href="controladorDatos">Nombre Grupo-Empresa</a></li>      
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estudiantes<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="notaEstudiante">Calificar Estudiantes</a></li>                          
                  </ul>
                </li>               
              </ul>
            </div>          
        </div>

        <div class="navbar-collapse collapse">
          <li class="dropdown navbar-brand navbar-right ">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido: <?php echo $this->session->userdata('usuario'); ?></php??><b class="caret"></b></a>
               <ul class="dropdown-menu">
              <li><a href="inicio/cerrarSession">salir</a></li>                    
            </ul>
          </li>           
        </div><!--/.navbar-collapse -->
      </div>
    </div>
  </div>
</div>