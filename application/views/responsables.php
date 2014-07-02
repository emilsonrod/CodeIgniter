<?php $this->load->view('viewCabeceraLoggin');?>
<div id="columnacentral">
    <div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
        <div class="panel panel-primary">
        <div class="panel-heading">
    <h3 class="panel-title">Lista de Historias</h3>
  </div>
  <div class="panel-body" align="center">
      <?php 
        $identificador=0;
    foreach($historias as $index=>$tareas){?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
          <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panelMaster" href="#C-<?php echo $identificador;?>"><?php echo $index;?></a>
      </h4>
    </div>
    <div id="C-<?php echo $identificador;?>" class="panel-collapse collapse">
      <div class="panel-body">          
        <div class="table-responsive">
        <table class="table table-hover">         
         <thead>
            <tr>
            <th>HISTORIA</th><th>RESPONSABLE</th>
            </tr>
         </thead>
            <tbody>          
        <?php foreach($tareas as $valor){ ?>
                <tr>    
                <td><?php echo $valor['historia'];?></td>
                <td><?php echo $valor['responsable'];?></td>
                
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>          
      </div>
  </div>
  
</div><?php $identificador=$identificador+1; }?>
      
</div></div>
    </div>  
</div></div></div></div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
