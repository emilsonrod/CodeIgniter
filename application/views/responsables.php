<?php $this->load->view('viewCabecera');?>
<div id="columnacentral">
    <div class="panel panel-primary">
        <div class="panel-heading">
    <h3 class="panel-title">Lista de Historias</h3>
  </div>
  <div class="panel-body" align="center">
      <?php foreach($historias as $index=>$tareas){?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#">
          <?php echo $index;?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
            
          
        <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>TAREAS DE HISTORIAS DE USUARIO </th><th>RESPONSABLE</th>
            </tr>
         </thead>
            <tbody>          
        <?php foreach($tareas as $index => $valor){ ?>
                <tr>    
                <td><?php echo $index;?></td>
                <td><?php echo $valor;?></td>
                
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>          
          
          
          
          
          
      </div>
    </div>
  </div>
  
</div><?php }?>
      
</div>
    </div>  
</div>


<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>

