<?php $this->load->view('header');?>
<?php $this->load->view('cIzquierda');?>
<div id="columnacentral">
	
<?php     

$attributes = array('class' => '', 'id' => '');
echo form_open('grupoC', $attributes); ?>

<p>
        <label for="nombreCorto">Nombre Corto <span class="required">*</span></label>
        <?php echo form_error('nombreCorto'); ?>
        <br /><input id="nombreCorto" type="text" name="nombreCorto"  value="<?php echo set_value('nombre grupo'); ?>"  />
</p>

<p>
        <label for="nombreLargo">Nombre Largo <span class="required">*</span></label>
        <?php echo form_error('nombreLargo'); ?>
        <br /><input id="nombreLargo" type="text" name="nombreLargo"  value="<?php echo set_value('Significado del nombre '); ?>"  />
</p>

<p>
        <label for="docente">Docente</label>
        <?php echo form_error('docente'); ?>
        <?php $options = array(''  => 'Please Select',
                                                  
                                                  'example_value1'    => 'example option 1'
                     	                           
												); ?>

        <br /><?php echo form_dropdown('docente', $options, set_value('docente'))?>
</p>                                             
                        

<p>
        <?php echo form_submit( 'submit', 'Registrar'); ?>
</p>

<?php echo form_close(); ?>

</div>

<?php $this->load->view('cDerecha');?>
<?php $this->load->view('footer');?>