<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>
<div id="columnacentral">
	 
	<h1> Inscribirse Grupo</h1>
<?php    

$attributes = array('class' => '', 'id' => '');
echo form_open('registrarseGrupo', $attributes); ?>
<p>
        <label for="grupo">Grupo</label>
        <?php echo form_error('grupo'); ?>
        <?php       
         $options = $lista; 
         ?>

        <br /><?php echo form_dropdown('grupo', $options, set_value('grupo'))?>
</p>                        
<p>
        <label for="contrasenya">Contraseña <span class="required">*</span></label>
        <?php echo form_error('contrasenya'); ?>
        <br /><input id="contrasenya" type="password" name="contrasenya"  placeholder = "Contraseña del grupo" value="<?php echo set_value('contrasenya'); ?>"  />
</p>
<p>
        <?php echo form_submit( 'submit', 'Inscribirse'); ?>
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>