<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">
<p>
    <?php $metodo=array('method'=>'post') ;
        echo form_open('notaEstudiante',$metodo); ?>
        <label for="grupos">Grupos</label>

<div align="center">
    <select name="grupos" id="grupos">
        <option value="">Elejir grupo</option>
    <?php
                foreach ($grupos as $value) {
                    ?>
            <option value=<?php echo $value; ?>><?php echo $value; ?></option>        
                    <?php
                }?>

    </select>
<p></p>    
<p>
        <?php echo form_submit( 'submit', 'Calificar Estudiantes'); ?>
</p>
</div>
<?php echo form_close(); ?>
</p>

</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>