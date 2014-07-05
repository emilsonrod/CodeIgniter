<?php $this->load->view('viewCabeceraLoggin');?>
<div class='container'>
<div id="columnacentral">
<script type="text/javascript" src="js/validar_grupo.js"></script>
        <div class="row clearfix">
        <h1>Registrar nuevo grupo</h1>
        <?php
        $attributes = array('class' => 'navbar-form', 'id' => 'Registrargrupo');
        echo form_open('grupo', $attributes); ?>    
            <div class="col-md-6 column">
                <div class="panel panel-primary">
        <div class="panel-heading" align="center">Integrantes</div>
        <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">         
                         <thead>
                            <tr>
                            <th>#</th><th>Usuario</th><th>Clave</th>
                            </tr>
                         </thead>
                            <tbody>      
                                <tr>
                                <td>1</td><td>
                                    <div class="form-group">
                                    <?php echo form_input(array('class'=>"form-control",'name'=>'u1','id'=>'u1','type'=>'text','disabled'=>'true','value'=>$this->session->userdata('usuario'),'autofocus'=>'autofocus','size'=>'20'));?>
                                                        
                </div>
                                </td><td><div class="form-group">
                                 <input type="password" class="form-control" id="p1" name="p1" disabled="true" value="claveU" required>
                </div></td>
                                </tr>
                                <tr>
                                <td>2</td><td><div class="form-group">
                                <?php echo form_input(array('class'=>"form-control",'name'=>'u2','id'=>'u2','type'=>'text','required'=>'true','value'=>set_value('u2'),'autofocus'=>'autofocus','size'=>'20'));?>
    <h5><?php echo form_error('u2'); ?></h5>
                </div>
                </td>
                <td><div class="form-group">
                     <?php echo form_input(array('class'=>"form-control",'name'=>'p2', 'id'=>'p2','required'=>'true' ,'type'=>'password', 'value'=>set_value('p2'),'autofocus'=>'autofocus', 'size'=>'20'))?>
    <h5><?php echo form_error('p2');?></h5>
                </div></td>
                                </tr>
                                <tr>
                                <td>3</td><td><div class="form-group">
                     <?php echo form_input(array('class'=>"form-control",'name'=>'u3','required'=>'true','id'=>'u3','type'=>'text','value'=>set_value('u3'),'autofocus'=>'autofocus','size'=>'20'));?>
    <h5><?php echo form_error('u3'); ?></h5>
                </div></td><td><div class="form-group">
                     <?php echo form_input(array('class'=>"form-control",'name'=>'p3','required'=>'true', 'id'=>'p3', 'type'=>'password', 'value'=>set_value('p3'),'autofocus'=>'autofocus', 'size'=>'20'))?>
    <h5><?php echo form_error('p3');?></h5>
                </div></td>
                                </tr>
                           <!--     <tr>
                                <td>4</td><td><div class="form-group">
                     <input type="text" class="form-control" id="u4" name="u4" required>
                </div></td><td><div class="form-group">
                     <input type="password" class="form-control" id="p4" name="p4" required>
                </div></td>
                                </tr>
                                <tr>
                                <td>5</td><td><div class="form-group">
                     <input type="text" class="form-control" id="u5" name="u5" required>
                </div></td><td><div class="form-group">
                     <input type="password" class="form-control" id="p5" name="p5" required>
                </div></td>
                                </tr>-->
                            </tbody>
                        </table>
                 </div>
                   
                              
                 </div>
                 </div>
                 <span>No deben repetirse los Usuarios asegurarse q el ususario no pertenesca  otro grupo</span>
            </div>
            <div class="col-md-6 column">
                <p>
    <?php echo form_label('Nombre Corto','nombreCorto');?> <span class="required">*</span><br/>
    <?php
        echo form_input(array('required'=>'true','class'=>"form-control",'name'=>'nombreCorto','id'=>'nombreCorto','type'=>'text','placeholder'=>'Nombre acronimo','value'=>set_value('nombreCorto'),'autofocus'=>'autofocus','size'=>'50'));   
    ?>
    <h5><?php echo form_error('nombreCorto'); ?></h5>
</p>

<p>
    <?php echo form_label('Nombre Largo','nombreLargo');?> <span class="required">*</span><br/>
    <?php echo form_input(array('required'=>'true','class'=>"form-control",'name'=>'nombreLargo','id'=>'nombreLargo','type'=>'text','placeholder'=>'Significado del acronimo','value'=>set_value('nombreLargo'),'autofocus'=>'autofocus','size'=>'50'));?>
    <h5><?php echo form_error('nombreLargo'); ?></h5>
</p>
<p>
    <?php echo form_label('Correo de la Empresa', 'correo')?> <span class="required">*</span><br/>
    <?php echo form_input(array('required'=>'true','class'=>"form-control",'name'=>'correo', 'id'=>'correo', 'type'=>'text', 'value'=>set_value('correo'), 'placeholder' => 'Ingrese text de la empresa', 'autofocus'=>'autofocus', 'size'=>'50'))?>
    <h5><?php echo form_error('correo');?></h5>
</p>
<p>
    <?php echo form_label('Contraseña', 'contrasenya')?> <span class="required">*</span><br/>
    <?php echo form_input(array('required'=>'true','class'=>"form-control",'name'=>'contrasenya', 'id'=>'contrasenya', 'type'=>'password', 'value'=>set_value('contrasenya'), 'placeholder' => 'Asignar contraseña', 'autofocus'=>'autofocus', 'size'=>'50'))?>
    <h5><?php echo form_error('contrasenya');?></h5>
</p>
<p>
    <?php echo form_label('Docente', 'docente')?> <span class="required">*</span><br/>
    <?php echo form_dropdown('docente', $docentes, set_value('docente'),array('class'=>"form-control")); ?>
    <h5><?php echo form_error('docente');?></h5>
</p>
<br/>
    
    <h5><?php echo form_error('integrante');?></h5>
            </div>
<div class="col-md-12 column">
<p>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>
</p>
</div>
<?php echo form_close(); ?>




        </div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
