<?php $this->load->view('viewCabeceraLogginDocente');?>
    <h1>Crear evento</h1>
<div id="columnacentral">
     <link rel="stylesheet" href="js/jquery-ui.css">
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/jquery-ui.js"></script>
   
   <script>
    (function ($) {
        $(document).ready(function () {
            $("#startdate").datepicker();       
        });
    })(jQuery);
    (function ($) {
        $(document).ready(function () {
            $("#enddate").datepicker();            
        });
    })(jQuery);
</script>
<div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="conteiner"> 
 <form class="cmxform form-horizontal navbar-form navbar-center" id="frmcalendar" method="post" novalidate="novalidate">
     <div class="control-group ">
            <label  for="Fecha inicio" class="control-label">Fecha inicio :</label>
            <div class="controls">  
                    <input class = "form-control" id="startdate" name="startdate" type="text" placeholder = 'DD/MM/AAAA'>
                    <?php echo form_error ('startdate') ;?>
            </div>
        </div>
        <div class="control-group ">
            <label for="Fecha final" class="control-label">Fecha final :</label>
            <div class="controls">
                <input class = "form-control" id="enddate" name="enddate" type="text" placeholder = 'DD/MM/AAAA'>
                <?php echo form_error ('enddate') ;?>
            </div>
        </div>
         <label class="control-label">Seleccionar grupo(s) :</label>
         
        <div align="rigth">
            <select class = "form-control" name="grupos" id='grupos'>   
                    <?php
                           foreach ($grupos as $value) {
                   ?>
                     <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                            <?php
                        }
                    ?>
                <option id="todos" value="">todos</option> 
            </select>
            <?php echo form_error ('grupos') ;?>
            <span style=";font-family:comic sans ms;font-size:13px;color:red;" align="center" > (*) EL CAMPO GRUPO ES OBLIGATORIO </span>
        </div>
        <p>
                <label style ="fontsize = 14px;" for="Tipo evento"class="control-label">Tipo de evento :</label>
                 <?php
                        foreach ($tipo as $value) {
                            ?>
                            <div>
                                 <?php echo form_radio('tipo',$value,FALSE,null)."".$value; ?> <br />
                            </div>
                            <?php
                        }?>
            <h5><?php   echo form_error('tipo'); ?></h5>
        </p>
        <div class="control-group ">
            <label for="Evento" class="control-label">Evento</label>
            <div class="controls">
                <textarea class = "form-control" maxLength=150 name="event" style = "width:300px; height:80px;" rows="6" id="event"></textarea>

                <?php echo form_error ('event') ;?>
            </div>
        </div>
        <br/>
        <div class="form-actions">
            <button class="btn btn-primary" name="submit" id="submit" type="submit">Crear evento</button>
            
        </div>
    </form>
    <?php $this->load->view('viewPiePagina');?>
</div>
</div>
</div>
</div>
