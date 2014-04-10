<div id="columnaizquierdaLogin"> 
	<h1> Loggin Usuario</h1>
    
	<?php echo form_open('login');?>	     
		<p>
		<?php echo form_label('nombre', 'nombre')?>
		<?php echo form_input(array('name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre de Usuario', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('nombre');?>
		</p>
		<p>
		<?php echo form_label('passw', 'passw')?>
		<?php echo form_password(array('name'=>'passw', 'id'=>'passw', 'type'=>'text', 'value'=>set_value('passw'), 'placeholder' => 'Ingrese su contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('passw')?>
		</p>
		<p><?php echo form_submit('Ingresar', 'Ingresar')?>
		<?php echo form_submit('Registrarse', 'Registrarse')?>
		</p>
	<?php echo form_close()?>
	
	

</div>