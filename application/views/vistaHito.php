<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">

	<form action="calificarHito" method="post">   
    	<div class="panel panel-primary">
    	<div class="panel-heading" align="center">Hitos</div>
		 
		 <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>Hito</th><th>Fecha</th><th>Nota</th>
            </tr>
         </thead>
            <tbody>          
        <?php foreach($hito as $index => $valor){ ?>
                <tr>    
                <td><?php echo $valor['NombreEntrega'];?></td>
                <td><?php echo $valor['FechaEntrega'];?></td>
                <td>
		<input type="number" name="<?php echo $index;?>" min="0" max="100" step="0.5" value=<?php echo $valor['nota']; ?>  />       
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        </div> 
   		 <?php echo form_submit( 'submit', 'Agregar'); ?>
 		</div>
	</form>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>