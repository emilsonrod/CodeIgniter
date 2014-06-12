<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">

  <!--  <?php
        //foreach($grupos as $key => $value){ ?>
            <a href="notaEstudiante" class="btn btn-primary" rol="button" name="<?php //echo $key; ?>" ><?php //echo $key ?>
            <span class="badge"><?php //echo $value; ?></span>
            </a>
        <?php// } ?>-->
<p>
    <?php $metodo=array('method'=>'post') ;
        echo form_open('notaEstudiante',$metodo); ?>
        <label for="grupos">Grupos</label>

<div align="center">
    <select name="grupos">    
    <?php
                foreach ($grupos as $value) {
                    ?>
            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                    <?php
                }?>

    </select>

<p></p>
<p>
        <?php echo form_submit( 'submit', 'Estudiantes'); ?>
</p>
</div>
<?php echo form_close(); ?>
</p>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>