<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">
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
<input required="required" type="number" name="<?php echo $index;?>" min="0" max="100" step="1" value=<?php echo $valor['nota']; ?> autofocus />       
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        </div>       
    </div>
    <div align="center">
    <input type="submit" name="submit" value="Aceptar" class="btn btn-primary ">
    <a href="notaEstudiante" class="btn btn-primary" role="button">Cancelar</a>
</div></form>
<div>
<p><strong><mark id="ayuda">TOMAR ENCUENTA</mark></strong></p>
<p>*Nota limite [0-100]<br/> *Solo numeros <br/>*No vacio</p>
     
</div>    
</div>

<script type="text/javascript" src="js/validaciones.js"></script>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>