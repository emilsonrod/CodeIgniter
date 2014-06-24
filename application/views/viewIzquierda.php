<div id="columnaizquierda">
<?php
    $tareas=$this->session->userdata('tareas');
	foreach ($tareas as $key => $value) {
      if($key!='historia'){
    ?>
        
		<li><a href="<?php echo site_url($key); ?>"><?php echo $value; ?></a></li>
	   
    <?php
      }else{?>
    <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle"
    data-toggle="dropdown"><?php echo $value;?>
     <span class="caret"></span>
  </button>
 
  <ul class="dropdown-menu" role="menu">
    <li><a href="historia">Nueva Historia</a></li>
    <li><a href="historiaTareas">Asignar Tareas</a></li>
    <li class="divider"></li>
    <li><a href="tareaResponsable">Ver Historias</a></li>
  </ul>
</div>
    <?php      
      }
	}
?>
</div>
