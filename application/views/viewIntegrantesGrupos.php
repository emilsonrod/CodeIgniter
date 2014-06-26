<?php $this->load->view('viewCabeceraLogginDocente2');?>

<div id="columnacentral">
<div class="navbar-collapse collapse center-block"> 
 <div class='conteiner'>
    <?php
    $attributes = array('class' => 'navbar-form navbar-center', 'id' => 'VerGrupo');
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
            <button type="submit" id="Ver" class="btn btn-success">Ver</button>
    </p>

    <?php echo form_close(); ?>
</div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
