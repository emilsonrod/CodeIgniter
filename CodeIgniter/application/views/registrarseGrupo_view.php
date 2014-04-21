<?php $this->load->view('header');?>
<?php $this->load->view('cIzquierda');?>
<div id="columnacentral">
<?php    

$attributes = array('class' => '', 'id' => '');
echo form_open('regGrupoC', $attributes); ?>
<div id="columnacentral">
<p>
        <label for="grupo">Grupo</label>
        <?php echo form_error('grupo'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
                                                  ''  => 'Please Select',
                                                  'example_value1'    => 'example option 1'
                                                ); ?>

        <br /><?php echo form_dropdown('grupo', $options, set_value('grupo'))?>
</p>                                             
                        
<p>
        <label for="contrasenya">Contraseña <span class="required">*</span></label>
        <?php echo form_error('contrasenya'); ?>
        <br /><input id="contrasenya" type="password" name="contrasenya"  value="<?php echo set_value('contrasenya'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Inscribirse'); ?>
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('cDerecha');?>
<?php $this->load->view('footer');?>