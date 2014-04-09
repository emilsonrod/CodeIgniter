<div id="columnacentral">
                    
    <h1> Crear una Cuenta</h1>
    <p><?php $error?></p>
    <?php echo validation_errors('<div class="errors">','</div>'); ?>
	<?php echo form_open_multipart('register/addUser');?>	     
		<p>
		<?php echo form_label('nombre', 'nombre')?>
		<?php echo form_input(array('name'=>'nombre', 'id'=>'nombre', 'type'=>'text', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p>
		<?php echo form_label('apellidos', 'apellidos')?>
		<?php echo form_input(array('name'=>'apellidos', 'id'=>'lastname', 'type'=>'text', 'value'=>set_value('apellidos'), 'placeholder' => 'Ingrese su apellido', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p>
		<?php echo form_label('loggin', 'loggin')?>
		<?php echo form_input(array('name'=>'loggin', 'id'=>'loggin', 'type'=>'text', 'value'=>set_value('loggin'), 'placeholder' => 'Ingrese su nombre de usuario', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p>
		<?php echo form_label('passw', 'passw')?>
		<?php echo form_input(array('name'=>'passw', 'id'=>'passw', 'type'=>'text', 'value'=>set_value('passw'), 'placeholder' => 'Ingrese la contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p>
		<?php echo form_label('correo', 'correo')?>
		<?php echo form_input(array('name'=>'correo', 'id'=>'correo', 'type'=>'text', 'value'=>set_value('correo'), 'placeholder' => 'Ingrese su correo electronico', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		</p>
		<p><?php echo form_submit('Registrar', 'Registrar')?>
	<?php echo form_close()?>
</div>