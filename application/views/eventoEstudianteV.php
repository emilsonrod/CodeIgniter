<?php $this->load->view('viewCabeceraLoggin');?> 
<h1>CREAR EVENTO</h1>
<link rel="stylesheet" href="js/jquery-ui.css">
 <script src="js/jquery-1.10.2.js"></script>
 <script src="js/jquery-ui.js"></script>
  <script src="js/es.js"></script>
   
   <script>
        $.datepicker.regional['es'] = {
         closeText: 'Cerrar',
         prevText: '<Ant',
         nextText: 'Sig>',
         currentText: 'Hoy',
         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
         weekHeader: 'Sm',
         dateFormat: 'dd/mm/yy',
         firstDay: 1,
         isRTL: false,
         showMonthAfterYear: false,
         yearSuffix: ''
         };
         $.datepicker.setDefaults($.datepicker.regional['es']);

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
            <span style=";font-family:comic sans ms;font-size:13px;color:red;" align="center" > (*) EL CAMPO TIPO DE EVENTO ES OBLIGATORIO </span>
        </div>

        <div class="control-group ">
            <label for="Evento" class="control-label">Evento</label>
            <div class="controls">
                <textarea class = "form-control" name="event" rows="6" id="event" class="input-large"></textarea>
                <?php echo form_error ('event') ;?>
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
