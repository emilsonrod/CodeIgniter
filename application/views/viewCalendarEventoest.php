<?php $this->load->view('viewCabeceraLoggin');?>

<div id="columnacentral">
	<div id="contenedorSubirDoc">
		<link href='css/fullcalendar2.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='js/jquery.min.js'></script>
		<script src='js/jquery-ui.custom.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/es.js'></script>
		<script>
		(function ($) {
        $(document).ready(function () {
            $('#calendar').fullCalendar({
			//defaultDate: '2014-06-12',
			editable: false,
			
			events: "calendarEventoEst/getEventos",
			color: 'yellow',   // an option!
    		textColor: 'black'
		});
		       
        });
    })(jQuery);
	

</script>
<style>
	#calendar {
		width: 900px;
		margin: 0px auto;
		text-transform:uppercase;

	}

</style>
<div id='calendar' style = "width: 900px;margin: 0px auto;"></div>










	</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>