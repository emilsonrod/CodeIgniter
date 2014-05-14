<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>

<div id="columnacentral">
	<h1>Registrar nuevo grupo</h1>
<?php

$attributes = array('class' => '', 'id' => '');
echo form_open('grupo', $attributes); ?>

	<p>
        <label for="nombreCorto">Nombre Corto <span class="required">*</span></label>
        <?php echo form_error('nombreCorto'); ?>
        <br /><input id="nombreCorto" type="text" name="nombreCorto"  placeholder = "Nombre acronimo"value="<?php echo set_value('nombre grupo'); ?>"  />
</p>

<p>
        <label for="nombreLargo">Nombre Largo <span class="required">*</span></label>
        <?php echo form_error('nombreLargo'); ?>
        <br /><input id="nombreLargo" type="text" name="nombreLargo" placeholder = "Significado del acronimo" value="<?php echo set_value('Significado del nombre '); ?>"  />
</p>
<p>
        <label for="contrasenya">Contraseña <span class="required">*</span></label>
        <?php echo form_error('contrasenya'); ?>
        <br /><input id="contrasenya" type="password" name="contrasenya"  placeholder = "Asignar contraseña" value="<?php echo set_value('contrasenya'); ?>"  />
</p>
<p>
        <label for="docente">Docente</label>
        <?php echo form_error('docente');
              $options =$docentes;

	     ?>
        <br /><?php echo form_dropdown('docente', $options, set_value('docente')); ?>
</p>
         <p>
		<?php echo form_hidden('representante',$this->session->userdata('id'))?>
		<h5><?php echo form_error('representante');?></h5>
		</p>
        <p>
            <h5><?php echo form_error('integrante');?></h5>
        </p>

<p>
        <?php echo form_submit( 'submit', 'Registrar'); ?>
</p>

<?php echo form_close(); ?>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
