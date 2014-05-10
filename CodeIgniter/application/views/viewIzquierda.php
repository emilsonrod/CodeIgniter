<div id="columnaizquierda">      
<?php
/*
	<li><a href="grupo">Registrar Grupo</a></li>
                            <li><a href="registrarseGrupo">Inscribirse Grupo</a></li>
                            <li><a href="listaGrupos">Dar Baja Grupos</a></li>
                             <li><a href="integrantes">integrantes de Grupo</a></li>
*/
	foreach ($tareas as $key => $value) {?>
		<li><a href="<?php echo site_url($key) ?>"><?php echo $value; ?></a></li>	
	<?php
	}
?>

</div>