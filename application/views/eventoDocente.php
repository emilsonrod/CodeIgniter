<?php $this->load->view('viewCabeceraLogginDocente');?>
    <h1>Crear evento</h1>
<div id="columnacentral">
    <link type="text/css" href="./css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" rel="Stylesheet" />   
   <script type="text/javascript" src="./js/jquery.min.js"></script>
   <script type="text/javascript" src="./js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>
   <script type="text/javascript" src="./js/jquery.ui.datepicker-es.js"></script>
   
    <script>
        $(document).ready(function(){
           $("#startdate").datepicker({
              showOn: 'both',
              buttonImage: 'calendar.png',
              buttonImageOnly: true,
              changeYear: true,
              numberOfMonths: 2,
              onSelect: function(textoFecha, objDatepicker){
              }
           });
        })
</script>
    </script>
<div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="conteiner"> 
 <form class="cmxform form-horizontal navbar-form navbar-center" id="frmcalendar" method="post" novalidate="novalidate">
     <div class="control-group ">
            <label  for="Fecha inicio" class="control-label">Fecha inicio</label>
            <div class="controls">  
                    <input class = "form-control" id="startdate" name="startdate" type="text" placeholder = 'formato: DD/MM/AAAA'>
                    <?php echo form_error ('startdate') ;?>
            </div>
        </div>
        <div class="control-group ">
            <label for="Fecha final" class="control-label">Fecha final</label>
            <div class="controls">
                <input class = "form-control" id="enddate" name="enddate" type="text" placeholder = 'formato: DD/MM/AAAA'>
                <?php echo form_error ('enddate') ;?>
            </div>
        </div>
         <label class="control-label">Seleccionar grupo(s)</label>
         
        <div align="rigth">
            <select class = "form-control" name="grupos" id='grupos'>  
                <option value="">--- Seleccionar ---</option>  
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
        </div>
        <p>
                <label for="Tipo de evento">tipo de evento</label>

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
                <textarea class = "form-control" name="event" rows="6" id="event" value =set_value('event') class="input-large"></textarea>
                <?php echo form_error ('event') ;?>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" name="submit" id="submit" type="submit">Crear evento</button>
            <button class="btn" type="button">Cancelar</button>
        </div>
    </form>
    <?php $this->load->view('viewPiePagina');?>
</div>
</div>
</div>
</div>
