<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">
<?php
$attributes = array('class' => '', 'id' => '');
echo form_open('integrantes', $attributes); ?>

<p>

        <?php echo form_error('grupos'); ?>
        <label for="grupos">Grupos</label>

         <?php
                foreach ($grupos as $value) {
                    ?>
                    <div>
                    	 <?php echo form_radio('integrantes',$value,FALSE,null)."".$value; ?> <br />
                    </div>
                    <?php
                }
                 echo form_error('integrantes');
                ?>

</p>

<p>
        <?php echo form_submit( 'submit', 'Ver'); ?>
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
