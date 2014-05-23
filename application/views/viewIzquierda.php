<div id="columnaizquierda">
<?php
    $tareas=$this->session->userdata('tareas');
	foreach ($tareas as $key => $value) {?>
		<li><a href="<?php echo site_url($key); ?>"><?php echo $value; ?></a></li>
	<?php
	}
?>

</div>
