<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">
    <script type="text/javascript" src="js/validacion.js"></script>
   <div class="panel panel-primary">
        <div class="panel-heading">
    <h3 class="panel-title">Nueva Historia</h3>
  </div>
  <div class="panel-body" align="center">
     <form class="navbar-form navbar-left" role="form" action="historia" method="post">
         <div class="form-group">
				<input  type="text" class="form-control" size="60" name="historiaNueva" id="historiaNueva">
                
         </div>         
         <button onsubmit="texto()"type="submit" class="btn btn-primary">Aceptar</button>
         <div>
            <h5><?php echo form_error('historiaNueva');?></h5>
         </div>
    </form>
  </div>
<div id="listaHistorias">
    <ul class="list-group">
        <?php if(count($historias)>0)
        {  foreach($historias as $valor){ ?>
     
     <li class="list-group-item"><?php echo $valor; ?></li>
        <?php 
            }
        }?>
    </ul>
</div>
 </div>    
  <!--<div class="panel-footer">Panel footer</div>-->

</div>
        
</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>