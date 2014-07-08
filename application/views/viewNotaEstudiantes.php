<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral" align="center">

<form action="calificarEstudiante" method="post">    
    <div class="panel panel-primary">
        <div class="panel-heading" align="center">Integrantes</div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nota</th>
            </tr>
         </thead>
            <tbody>          
        <?php foreach($integrantes as $index => $valor){ ?>
                <tr>    
                <td><?php echo $valor['nombre'];?></td>
                <td><?php echo $valor['paterno'];?></td>
                <td><?php echo $valor['materno'];?></td>
                <td>
<input type="number" name="<?php echo $index;?>" min="0" max="100" step="0.5" onkeypress="return soloNumerosBody(event)" value=<?php echo $valor['nota']; ?>  />       
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        </div>       
    </div><!--F mi cambio agregue* class="btn btn-success"-->
    <?php echo form_submit( 'submit', 'Aceptar','class="btn btn-success"'); ?>
</form>   
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>