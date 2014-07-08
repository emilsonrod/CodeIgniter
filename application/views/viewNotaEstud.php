<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
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
        <?php echo form_submit( 'submit', 'Estudiantes','class="btn btn-success"'); ?>
</p>
</div>
<?php echo form_close(); ?>
</p>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>