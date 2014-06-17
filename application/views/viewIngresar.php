<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">
	<div class="panel panel-primary">
        <div class="panel-heading" align="center"><h1> Loggin Usuario</h1></div>
         <div class="panel-body" align="center">   

	<?php echo form_open('ingresar');?>
		<p> <?php echo $error; ?></p>
		<p>
		<?php echo form_label('Nombre', 'nombre')?><br/>
		<?php echo form_input(array('required'=>'required','name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'), 'placeholder' => 'Ingrese su nombre de Usuario', 'autofocus'=>'autofocus', 'size'=>'25'))?>
		<?php echo form_error('nombre');?>
		</p>
		<p>
		<?php echo form_label('Password','passw')?><br/>
		<?php echo form_password(array('required'=>'required','name'=>'passw', 'id'=>'passw', 'type'=>'text', 'value'=>set_value('passw'), 'placeholder' => 'Ejm:  AAaa44 ó AAAaaa444', 'autofocus'=>'autofocus', 'size'=>'25'))?>
		<?php echo form_error('passw')?>
		</p>
		<p>
		<?php echo form_submit('Ingresar', 'Ingresar')?>
		</p>
	<?php echo form_close()?>
  </div>
        
 </div>
<div>
<p><strong><mark id="ayuda">TOMAR ENCUENTA</mark></strong></p>
<p>*Contraseña inicia en el orden mayuscula-minuscula-numero<br/> *Contraseña longitud minima 6 caracteres <br/>*Los campos no vacio</p>
</div>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>

