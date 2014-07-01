<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fullcalendar in Codeigniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
     <script src="../assets/js/html5shiv.js"></script>
   <![endif]-->
 
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link href="css/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
   
<!-- Favicons
 ================================================== -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
 
  <body>
 
   <!-- <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menú
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?=base_url()?>">Home</a></li>
              <li><a href="./new_event">Nuevo Evento</a></li>
              <li><a href="http://blogcodes.reprodynamics.com/downloads/fullcalendar.zip">Download this proyect</a></li>
            </ul>
          </div><!--/.nav-collapse -->
      <!--  </div>
      </div>
    </div>-->
    <?php $this->load->view('viewCabeceraLogginDocente');?>
    <div id="columnacentral">
    <div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="container">
    <div id="resultado"> </div>
      <div id="calendar"> </div>
    <?php $this->load->view('viewPiePagina');?>
  </div>
  </div>
  </div>
    </div> <!-- /container -->
 
    <!-- Le javascript
   ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/mycalendar.js"></script>
    <script src="js/transition.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/scrollspy.js"></script>
    <script src="js/tab.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/popover.js"></script>
    <script src="js/button.js"></script>
    <script src="js/collapse.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/typeahead.js"></script>
 
  </body>
</html>