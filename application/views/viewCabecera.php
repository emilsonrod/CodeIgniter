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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/jumbotron.css" rel="stylesheet">
    <link href="./css/carousel.css" rel="stylesheet">
    
  </head>

  <body>
    <script>
      function soloLetrasHead(e) {
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
          especiales = [8, 37, 39, 46];

          tecla_especial = false
          for(var i in especiales) {
              if(key == especiales[i]) {
                  tecla_especial = true;
                  break;
              }
          }

          if(letras.indexOf(tecla) == -1 && !tecla_especial)
              return false;
      }

      function limpia() {
          var val = document.getElementById("nombre").value;
          var tam = val.length;
          for(i = 0; i < tam; i++) {
              if(!isNaN(val[i]))
                  document.getElementById("nombre").value = '';
          }

      }
    </script>
    <script>
      function soloLetrasBody(e) {
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
          especiales = [8, 37, 39, 46];

          tecla_especial = false
          for(var i in especiales) {
              if(key == especiales[i]) {
                  tecla_especial = true;
                  break;
              }
          }

          if(letras.indexOf(tecla) == -1 && !tecla_especial)
              return false;
      }

      function limpia() {
          var val = document.getElementById("nombre").value;
          var tam = val.length;
          for(i = 0; i < tam; i++) {
              if(!isNaN(val[i]))
                  document.getElementById("nombre").value = '';
          }

      }
    </script>
    <script>
      function soloNumerosBody(e) {
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toLowerCase();
          letras = " 1234567890";
          especiales = [8, 37, 39, 46];

          tecla_especial = false
          for(var i in especiales) {
              if(key == especiales[i]) {
                  tecla_especial = true;
                  break;
              }
          }

          if(letras.indexOf(tecla) == -1 && !tecla_especial)
              return false;
      }

      function limpia() {
          var val = document.getElementById("nombre").value;
          var tam = val.length;
          for(i = 0; i < tam; i++) {
              if(!isNaN(val[i]))
                  document.getElementById("nombre").value = '';
          }

      }
    </script>

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
                <li><a class="navbar-brand" href="inicio">home</a></li>  
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registrar <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php
                      $tareas=$this->session->userdata('tareas');
                      foreach ($tareas as $key => $value) {?>
                        <li><a class="navbar-brand" href="<?php echo site_url($key); ?>"><?php echo $value; ?></a></li>
                    <?php
                    }
                    ?>                    
                  </ul>
                </li>
              </ul>
            </div>  
          </div>

        <div class="navbar-collapse collapse">
           <?php echo form_open('ingresar',array('class'=>"navbar-form navbar-right", 'role'=>"form"));?>
          <!--<form class="navbar-form navbar-right" role="form">-->
            <div class="form-group">
              <?php echo form_input(array('class'=>"form-control",'type'=>"text",'onkeypress'=>"return soloLetrasHead(event)",'onblur'=>"limpia()",'required'=>'required','name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'), 'placeholder' => 'nombre de Usuario', 'autofocus'=>'autofocus', 'size'=>'25'))?>
              <?php echo form_error('nombre');?>
              <!--<input type="text" placeholder="Email" class="form-control">-->
            </div>           
            <div class="form-group">
              <?php echo form_password(array('class'=>"form-control",'required'=>'required','name'=>'passw', 'id'=>'passw', 'type'=>'password', 'value'=>set_value('passw'), 'placeholder' => 'contraseña', 'autofocus'=>'autofocus', 'size'=>'25'))?>
              <?php echo form_error('passw')?>
              <!--<input type="password" placeholder="Password" class="form-control">-->
            </div>
            <button type="submit" class="btn btn-success">Ingresar</button>
            <?php echo form_close()?>
          </form>

        </div><!--/.navbar-collapse -->
      </div>
    </div>
  </div>
</div>

    
  
