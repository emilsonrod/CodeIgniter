<?php $this->load->view('viewCabecera');?>
<div class="navbar-collapse collapse center-block">
	<div class="jumbotron">
	<div class="conteiner">
    <h1> Crear una Cuenta</h1>

	<?php echo form_open('registrar',array('class'=>"navbar-form navbar-center", 'role'=>"form-horizontal"));?>
	<fieldset>
	<legend >Ingrese los siguientes Datos Personales:</legend>
	<div class="form-group">
		<p>
		<?php echo form_label('Nombre', 'nombre')?>	
		</p>
		<p>	
		<?php echo form_input(array('class'=>"form-control",'name'=>'nombre', 'id'=>'nombre', 'type'=>'text', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('nombre');?></h5>
		</p>
		<p>
		<?php echo form_label('apellidoPaterno', 'apellidoPaterno')?>
		</p>
		<p>
		<?php echo form_input(array('class'=>"form-control",'name'=>'apellidoP', 'id'=>'apellidoP', 'type'=>'text', 'value'=>set_value('apellidoP'), 'placeholder' => 'Ingrese su apellido', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('apellidoP');?></h5>
		</p>
		<p>
		<?php echo form_label('apellidoMaterno', 'apellidoMaterno')?>
		</p>
		<p>
		<?php echo form_input(array('class'=>"form-control",'name'=>'apellidoM', 'id'=>'apellidoM', 'type'=>'text', 'value'=>set_value('apellidoM'), 'placeholder' => 'Ingrese su apellido', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('apellidoM');?></h5>
		</p>
	</div>
	<legend >Ingrese Datos de usuario:</legend>
		<p>
		<?php echo form_label('nombre usuario', 'nombre usuario')?>
		</p>
		<p>
		<?php echo form_input(array('class'=>"form-control",'name'=>'loggin', 'id'=>'loggin', 'type'=>'text', 'value'=>set_value('loggin'), 'placeholder' => 'Ingrese su nombre de usuario', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('loggin');?></h5>
		</p>
		<p>
		<?php echo form_label('contraseña', 'contraseña')?>
		</p>
		<p>
		<?php echo form_password(array('class'=>"form-control",'name'=>'passw', 'id'=>'passw', 'type'=>'text','value'=>set_value('passw'), 'placeholder' => 'Ingrese la contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('passw');?></h5>
		</p>
		<p>
		<?php echo form_label('confirmar contraseña', 'confirmar contraseña')?>
		</p>
		<p>
		<?php echo form_password(array('class'=>"form-control",'name'=>'repassw', 'id'=>'repassw', 'type'=>'text', 'value'=>set_value('repassw'), 'placeholder' => 'Vuelva a ingresar la contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('repassw');?></h5>
		</p>
		<p>
		<?php echo form_label('correo', 'correo')?>
		</p>
		<p>
		<?php echo form_input(array('class'=>"form-control",'name'=>'correo', 'id'=>'correo', 'type'=>'text', 'value'=>set_value('correo'), 'placeholder' => 'Ingrese su correo electronico', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('correo');?></h5>
		</p>
		<legend >Datos reuqeridos para confirmar qeu es Docente:</legend>
		<p>
		<?php echo form_label('La contraseña TIS es obligatoria para identificar docentes ','Contraseña Docente')?>
		</p>
		<p>
		<?php echo form_password(array('class'=>"form-control",'name'=>'passDocente', 'id'=>'passDocente', 'type'=>'text', 'value'=>set_value('passDocente'), 'placeholder' => 'Ingrese la contraseña tipo TIS', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('passDocente');?></h5>
		</p>
		<p>
		<?php echo form_label('Ingrese su CI para confirmar docente','Contraseña Docente')?>
		</p>
		<p>
		<?php echo form_input(array('class'=>"form-control",'name'=>'ciDocente', 'id'=>'ciDocente', 'type'=>'text', 'value'=>set_value('ciDocente'), 'placeholder' => 'Ingrese su C.I.', 'autofocus'=>'autofocus', 'size'=>'50'))?>
		<h5><?php echo form_error('ciDocente');?></h5>
		</p>

		<p><?php echo form_submit('Registrar', 'Registrar')?>
	</fieldset>
	<?php echo form_close()?>
	<div class="container">
      <hr>
      <footer>
        <p>&copy; Ankasoft-Technology 2014</p>
      </footer>
    </div> <!-- /container -->
</div>
</div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>