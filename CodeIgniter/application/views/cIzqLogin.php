<div id="columnaizquierdaLogin"> 
	<h1> Loggin Usuario</h1>
    <p><?php $error?></p>
    <?php echo validation_errors('<div class="errors">','</div>'); ?>
	<?php echo form_open_multipart('login');?>	     
		<p>
		<?php echo form_label('nombre', 'nombre')?>
		<?php echo form_input(array('name'=>'nombre', 'id'=>'nombre', 'type'=>'text', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre de Usuario', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p>
		<?php echo form_label('passw', 'passw')?>
		<?php echo form_input(array('name'=>'passw', 'id'=>'passw', 'type'=>'text', 'value'=>set_value('passw'), 'placeholder' => 'Ingrese su contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p><?php echo form_submit('Ingresar', 'Ingresar')?>
		<?php echo form_submit('Registrarse', 'Registrarse')?>
	<?php echo form_close()?>
	

</div>