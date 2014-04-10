<div id="columnacentral">                    
    <h1> Crear una Cuenta</h1>
    
	<?php echo form_open('register');?>	     
		<p>
		<?php echo form_label('nombre', 'nombre')?>
		<?php echo form_input(array('name'=>'nombre', 'id'=>'nombre', 'type'=>'text', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('nombre');?>
		</p>
		<p>
		<?php echo form_label('apellidos', 'apellidos')?>
		<?php echo form_input(array('name'=>'apellidos', 'id'=>'lastname', 'type'=>'text', 'value'=>set_value('apellidos'), 'placeholder' => 'Ingrese su apellido', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('apellidos');?>
		</p>
		<p>
		<?php echo form_label('loggin', 'loggin')?>
		<?php echo form_input(array('name'=>'loggin', 'id'=>'loggin', 'type'=>'text', 'value'=>set_value('loggin'), 'placeholder' => 'Ingrese su nombre de usuario', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('loggin');?>
		</p>
		<p>
		<?php echo form_label('passw', 'passw')?>
		<?php echo form_password(array('name'=>'passw', 'id'=>'passw', 'type'=>'text','value'=>set_value('passw'), 'placeholder' => 'Ingrese la contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('passw');?>
		</p>
		<p>
		<?php echo form_label('repassw', 'repassw')?>
		<?php echo form_password(array('name'=>'repassw', 'id'=>'repassw', 'type'=>'text', 'value'=>set_value('repassw'), 'placeholder' => 'Vuelva a ingresar la contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('repassw');?>
		</p>
		<p>
		<?php echo form_label('correo', 'correo')?>
		<?php echo form_input(array('name'=>'correo', 'id'=>'correo', 'type'=>'text', 'value'=>set_value('correo'), 'placeholder' => 'Ingrese su correo electronico', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<?php echo form_error('correo');?>
		</p>
		<p><?php echo form_submit('Registrar', 'Registrar')?>
	<?php echo form_close()?>
</div>