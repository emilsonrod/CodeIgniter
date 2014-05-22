<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">
	<h1>Registrar nuevo grupo</h1>
<?php

$attributes = array('class' => '', 'id' => '');
echo form_open('grupo', $attributes); ?>

	<p>
        <?php echo form_label('Nombre Corto','nombreCorto');?> <span class="required">*</span><br/>
        <?php
          echo form_input(array('name'=>'nombreCorto','id'=>'nombreCorto','type'=>'text','placeholder'=>'Nombre acronimo','value'=>set_value('nombreCorto'),'autofocus'=>'autofocus','size'=>'25'));   
        ?>
        <h5><?php echo form_error('nombreCorto'); ?></h5>
</p>

<p>
    <?php echo form_label('Nombre Largo','nombreLargo');?> <span class="required">*</span><br/>
    <?php echo form_input(array('name'=>'nombreLargo','id'=>'nombreLargo','type'=>'text','placeholder'=>'Significado del acronimo','value'=>set_value('nombreLargo'),'autofocus'=>'autofocus','size'=>'25'));?>
        <h5><?php echo form_error('nombreLargo'); ?></h5>
</p>
<p>
		<?php echo form_label('Correo de la Empresa', 'correo')?> <span class="required">*</span><br/>
		<?php echo form_input(array('name'=>'correo', 'id'=>'correo', 'type'=>'text', 'value'=>set_value('correo'), 'placeholder' => 'Ingrese email de la empresa', 'autofocus'=>'autofocus', 'size'=>'25'))?>
		<h5><?php echo form_error('correo');?></h5>
</p>
<p>
    <?php echo form_label('Contraseña', 'contrasenya')?> <span class="required">*</span><br/>
	<?php echo form_input(array('name'=>'contrasenya', 'id'=>'contrasenya', 'type'=>'password', 'value'=>set_value('contrasenya'), 'placeholder' => 'Asignar contraseña', 'autofocus'=>'autofocus', 'size'=>'25'))?>
		<h5><?php echo form_error('contrasenya');?></h5>
</p>
<p>
    <?php echo form_label('Docente', 'docente')?> <span class="required">*</span><br/>
    <?php echo form_dropdown('docente', $docentes, set_value('docente')); ?>
    <h5><?php echo form_error('docente');?></h5>
</p><br/>
    
    <h5><?php echo form_error('integrante');?></h5>
<p>
        <?php echo form_submit( 'submit', 'Registrar'); ?>
</p>

<?php echo form_close(); ?>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
