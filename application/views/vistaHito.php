<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
<div class="navbar-collapse collapse center-block"> 
 <div class='container'>
	<form action="calificarHito navbar-form navbar-center" method="post">   
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
		<input class="form-control" type="number" name="<?php echo $index;?>" min="0" max="100" step="0.5" value=<?php echo $valor['nota']; ?>  />       
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        </div> 
   		 <button type="submit" id="Agregar" class="btn btn-success">Agregar</button>
 		</div>
	</form>
</div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>