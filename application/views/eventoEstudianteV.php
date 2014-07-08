<?php $this->load->view('viewCabeceraLoggin');?>

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
<h1>CREAR EVENTO</h1>
<div class="navbar-collapse collapse center-block">
    <div class="jumbotron">
    <div class="conteiner"> 


 <form class="cmxform form-horizontal navbar-form navbar-center" id="frmcalendar" method="post" novalidate="novalidate">
        <div class="control-group ">
            <label for="Fecha inicio" class="control-label">Fecha inicio :</label>
            <div class="controls">
                <input class = "form-control" id="startdate" readonly name="startdate" type="text" placeholder = 'DD/MM/AAAA' >
                <div id="divError"><h5><?php echo form_error ('startdate') ;?></h5></div>
            </div>
        </div></br>
        <div class="control-group ">
            <label for="Fecha final" class="control-label">Fecha final :</label>
            <div class="controls">
                <input class = "form-control" id="enddate" name="enddate" readonly type="text"  placeholder = 'DD/MM/AAAA'>
                <div id="divError"><?php echo form_error ('enddate') ;?></div>
            </div>
        </div></br>
         <label for="Tipo evento"class="control-label">Tipo de evento :</label>
        <div align="rigth">
            <select class = "form-control" name="tipo">
            <option value="">--- Seleccionar ---</option> 
            <?php
                        foreach ($tipo as $value) {
                            ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                            <?php
                        }?>

            </select>
            <div id="divError"><?php echo form_error ('tipo') ;?></div>
            <span style=";font-family:comic sans ms;font-size:13px;color:red;" align="center" > (*) EL CAMPO TIPO DE EVENTO ES OBLIGATORIO </span>
        </div></br>

        <div class="control-group ">
            <label for="Evento" class="control-label">Evento :</label>
            <div class="controls">
                <textarea class = "form-control" maxLength=150 name="event" style = "width:300px; height:80px" rows="6" id="event"></textarea>
                <div id="divError"><h5><?php echo form_error ('event') ;?></h5></div>
            </div>
        </div>
        <br/>
        <div class="form-actions">
            <br/><button class="btn btn-primary" type="submit">Crear evento</button>
        </div>
    </form>
    <?php $this->load->view('viewPiePagina');?>
</div>
</div>
</div>