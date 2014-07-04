<?php $this->load->view('viewCabeceraLoggin');?>

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>   
<script>
    $(function() {
        $( "#startdate" ).datepicker({
            , altFormat: "DD, d 'de' MM 'de' yy"
        });

        $( "#enddate" ).datepicker({
            'setDate': '   13/03/2013'
            , altFormat: "DD, d 'de' MM 'de' yy"
        });
    });
</script>
<h1>CREAR EVENTO</h1>
<div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="conteiner"> 


 <form class="cmxform form-horizontal navbar-form navbar-center" id="frmcalendar" method="post" novalidate="novalidate">
     <div class="control-group ">
            <label for="Fecha inicio" class="control-label">Fecha inicio</label>
            <div class="controls">
                <input class = "form-control" id="startdate" name="startdate" type="text"  placeholder = 'formato: DD/MM/AAAA'>
                <?php echo form_error ('startdate') ;?>
            </div>
        </div>
        <div class="control-group ">
            <label for="Fecha final" class="control-label">Fecha final</label>
            <div class="controls">
                <input class = "form-control" id="enddate" name="enddate" type="text"  placeholder = 'formato: DD/MM/AAAA'>
                <?php echo form_error ('enddate') ;?>
            </div>
        </div>
         <label for="Tipo evento"class="control-label">Tipo de evento</label>
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
            <?php echo form_error ('tipo') ;?>
        </div>

        <div class="control-group ">
            <label for="Evento" class="control-label">Evento</label>
            <div class="controls">
                <textarea class = "form-control" name="event" rows="6" id="event" class="input-large"></textarea>
                <?php echo form_error ('event') ;?>
            </div>
        </div>

        <div class="form-actions">
            <button class="btn btn-success" type="submit">Crear evento</button>
            <button class="btn btn-success" type="button">Cancelar</button>
        </div>
    </form>
    <?php $this->load->view('viewPiePagina');?>
</div>
</div>
</div>
