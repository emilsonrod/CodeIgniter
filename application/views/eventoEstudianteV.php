<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">

 <form class="cmxform form-horizontal" id="frmcalendar" method="post" action="./eventoEstudiante/tocalendar" novalidate="novalidate">
     <div class="control-group ">
            <label for="startdate" class="control-label">Fecha inicio</label>
            <div class="controls">
                <input id="startdate" name="startdate" type="text">
            </div>
        </div>
        <div class="control-group ">
            <label for="enddate" class="control-label">Fecha final</label>
            <div class="controls">
                <input id="enddate" name="enddate" type="text">
            </div>
        </div>
         <labelclass="control-label">Tipo de evento</label>
        <div align="rigth">
            <select name="tipo">
            <option value="">--- Seleccionar ---</option> 
            <?php
                        foreach ($tipo as $value) {
                            ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                            <?php
                        }?>

            </select>
        </div>

        <div class="control-group">
            <label class="control-label">Todo el día</label>
            <div class="controls">
                <label class="radio">
                    <input id="allday" type="radio" name="allday" checked="true" value="1">
                    Sí                                        </label>
                <label class="radio">
                    <input id="allday" type="radio" name="allday" value="0">
                    No                                        </label>
            </div>
        </div>
        <div class="control-group ">
            <label for="event" class="control-label">Evento</label>
            <div class="controls">
                <textarea name="event" rows="6" id="event" class="input-large"></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit">Crear evento</button>
            <button class="btn" type="button">Cancelar</button>
        </div>
    </form>
</div>
<?php $this->load->view('viewPiePagina');?>