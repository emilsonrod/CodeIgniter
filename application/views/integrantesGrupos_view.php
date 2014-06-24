<?php $this->load->view('viewCabeceraLogginDocente');?>
<div id="columnacentral">
<?php
$attributes = array('class' => 'navbar-form navbar-center', 'id' => '');
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
                }?>
        <h5><?php   echo form_error('integrantes'); ?></h5>

</p>

<p>
        <button type="submit" id="Ingresar" class="btn btn-success">Ver grupos
        </button>        
</p>

<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
