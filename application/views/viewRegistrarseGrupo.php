<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">

	<h1> Inscribirse Grupo</h1>
<?php
echo form_open('registrarseGrupo'); ?>
<p>        
    <?php echo form_label('Grupo', 'grupo');?><br/>
    <?php echo form_dropdown('grupo', $lista, set_value('grupo')); ?>
    <h5><?php echo form_error('grupo'); ?></h5>
</p>
<p>
        <?php echo form_label('Contraseña','contrasenya');?><br/>
        <?php echo form_input(array('name'=>'contrasenya', 'id'=>'contrasenya', 'type'=>'password', 'placeholder' => 'Ingrese contraseña al grupo', 'autofocus'=>'autofocus', 'size'=>'30')); ?>
        <h5><?php echo form_error('contrasenya'); ?></h5>
</p>
        <h5><?php echo form_error('integrante');?></h5>
<p>
        <?php echo form_submit( 'submit', 'Inscribirse'); ?>
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
