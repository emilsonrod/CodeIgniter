<?php $this->load->view('viewCabeceraLogginDocente2');?>
<script type="text/javascript" src="js/mio/jquery.min.js"></script>
<script type="text/javascript" src="js/mio/bootstrap.min.js"></script>
<div id="columnacentral">

 <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">   
<form action="calificarhitos" method="post">    
    
    
    <div class="panel panel-primary">
        <div class="panel-heading" align="center">Hitos</div>
        <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>Nombre</th><th>Nota</th>
            </tr>
         </thead>
            <tbody>          
        <?php 
           $identificador=0;
            foreach($hitos as $index => $valor){ ?>
                <tr>    
                <td>
                    <a href="#M-<?php echo $identificador; ?>" role="button" class="btn" data-toggle="modal"><?php echo $valor['nombre'];?></a>
                    
			<div class="modal fade" id="M-<?php echo $identificador; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Historias de Usuario
							</h4>
						</div>
						<div class="modal-body">
							  <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>Historia</th><th>Responsable</th>
            </tr>
         </thead>
            <tbody>          
      			<?php
                        $historias=$valor['historias'];                        
                    foreach($historias as $historia){?>
                <tr><td><?php echo $historia['historia']; ?></td><td><?php echo $historia['responsable']; ?></td></tr>
      	<?php } ?>		
            </tbody>
        </table>
        </div>
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
						</div>
					</div>
					
				</div>
				
			</div>
                </td>                   
                <td>
<input type="number" name="<?php echo $index;?>" min="0" max="100" step="1" onkeyUp="return valNumero(this);" value=<?php echo $valor['nota']; ?> required />       
                </td>
                </tr>
                
              
                
            <?php $identificador=$identificador+1;} ?>
                   
  
                
            </tbody>
            </table>
        </div>
        </div>       
    </div>
    <?php echo form_submit( 'submit', 'Aceptar'); ?>
</form>
    
</div></div></div></div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>