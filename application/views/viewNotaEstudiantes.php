<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">
<?php
echo form_open('calificarEstudiante'); ?>
    <div class="panel panel-primary">
        <div class="panel-heading" align="center">Integrantes</div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">         
          <tr><th><strong>Nombre</strong></th>
              <th><strong>Apellido Paterno</strong></th>
              <th><strong>Apellido Materno</strong></th>
              <th><strong>Nota</strong></th>
              
           </tr><tbody>          
        <?php foreach($integrantes as $index => $valor){ ?>
                <tr>
                <td><?php echo $valor['nombre'];?></td>
                <td><?php echo $valor['paterno'];?></td>
                <td><?php echo $valor['materno'];?></td>
                <td><?php echo $valor['nota'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        </div>       
    </div>
     <button type="submit" class="btn btn-warning" align="center">Aceptar</button>
<?php echo form_close(); ?>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>