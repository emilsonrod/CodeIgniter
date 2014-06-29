<?php $this->load->view('viewCabeceraLogginDocente');?>

<div id="columnacentral">
<div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="conteiner"> 
 <form class="cmxform form-horizontal navbar-form navbar-center" id="frmcalendar" method="post" action="./eventoDocenteC/tocalendar" novalidate="novalidate">
     <div class="control-group ">
            <label for="startdate" class="control-label">Fecha inicio</label>
            <div class="controls">
                <input class = "form-control" id="startdate" name="startdate" type="text">
            </div>
        </div>
        <div class="control-group ">
            <label for="enddate" class="control-label">Fecha final</label>
            <div class="controls">
                <input class = "form-control" id="enddate" name="enddate" type="text">
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
        </div>
        <p>
            <?php echo form_error('tipo'); ?>
                <label for="tipo">tipo de evento</label>

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

        <div class="control-group">
            <label class="control-label">Todo el día</label>
            <div class="controls">
                <label class="radio">
                    <input class = "form-control" id="allday" type="radio" name="allday" checked="true" value="1">
                    Sí                                        </label>
                <label class="radio">
                    <input class = "form-control" id="allday" type="radio" name="allday" value="0">
                    No                                        </label>
            </div>
        </div>
        <div class="control-group ">
            <label for="event" class="control-label">Evento</label>
            <div class="controls">
                <textarea class = "form-control" name="event" rows="6" id="event" class="input-large"></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit">Crear evento</button>
            <button class="btn" type="button">Cancelar</button>
        </div>
    </form>
    <?php $this->load->view('viewPiePagina');?>
</div>
</div>
</div>
</div>
