<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">

	<h1> Inscribirse Grupo</h1>
<?php
echo form_open('registrarseGrupo'); ?>
<p>        
    <?php echo form_label('Grupo', 'grupo');
          echo form_error('grupo');        
          $options = $lista;
    ?>
        <br /><?php echo form_dropdown('grupo', $options, set_value('grupo'))?>
</p>
<p>
        <?php echo form_label('Contraseña','contrasenya');?><br/>                                                                                                            
         <?php echo form_error('contrasenya');
        echo form_input(array('name'=>'contrasenya', 'id'=>'contrasenya', 'type'=>'password', 'placeholder' => 'Ingrese contraseña al grupo', 'autofocus'=>'autofocus', 'size'=>'30'))?>
        
</p>
        <h5><?php echo form_error('confirmacionPassword');?></h5>
        <h5><?php echo form_error('integrante');?></h5>
<p>
        <?php echo form_submit( 'submit', 'Inscribirse'); ?>
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
