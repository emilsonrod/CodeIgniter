<?php $this->load->view('viewCabeceraLogginDocente');?>
<?php $this->load->view('viewIzquierda');?>
<!--calendario  de  grupos-->
<div id="columnaCalendar">
	<div>
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
			
			events:<?php echo $eventos?>,
		});
		       
        });
    })(jQuery);
	

</script>
<center><div id="titulo" style = "text-transform:uppercase;"><h3><?php echo $nombre;?></h3></div></center>
<div id='calendar' style = "width: 900px;margin: 40px auto; text-transform:uppercase;"></div>

</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>