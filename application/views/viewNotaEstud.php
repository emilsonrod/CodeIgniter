<?php $this->load->view('viewCabeceraLogginDocente');?>
<div class="row" >
<div class="col-md-3" ></div>
<div id="columnacentral" align="center" class="col-md-6" >

    <div class="panel panel-default">
    <div class="panel-heading">Grupos</div>
  <div class="panel-body " >
    
    <?php $metodo=array('method'=>'post','role'=>'form') ;
        echo form_open('notaEstudiante',$metodo); ?>
        

    <div class="form-group">
    <select name="grupos" class="form-control">    
    <?php
                foreach ($grupos as $value) {
                    ?>
            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                    <?php
                }?>

    </select>

    
    </div>
    <div class="form-group">

        <?php echo form_submit( 'submit', 'Estudiantes','class="btn btn-success"'); ?>
    
    </div>
        <?php echo form_close(); ?>


  </div>
  
</div>


    
    
    
</div>
<div class="col-md-3" ></div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>