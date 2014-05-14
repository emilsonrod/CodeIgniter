<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>

<div id="columnacentral">
<?php

$attributes = array('class' => '', 'id' => '');
echo form_open('listaGrupos', $attributes); ?>

<p>

        <?php echo form_error('grupos'); ?>
        <label for="grupos">Grupos</label>

         <?php
                foreach ($grupos as $value) {
                    ?>
                    <div>
                    	 <?php echo form_checkbox('grupos[]',$value,FALSE)."".$value; ?> <br />
                    </div>
                    <?php
                }echo form_error('grupos[]');?>

</p>

<p>
        <?php echo form_submit( 'submit', 'Dar Baja'); ?>
</p>

<?php echo form_close(); ?>
</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
