<?php $this->load->view('viewCabeceraLogginDocente');?>

<div id="columnacentral">
<?php


echo form_open('listaGrupos',array('class'=>"navbar-form navbar-center", 'role'=>"form-horizontal")); ?>

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
        <button type="submit" id="baja" class="btn btn-success">Dar Baja</button>
</p>

<?php echo form_close(); ?>
</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
