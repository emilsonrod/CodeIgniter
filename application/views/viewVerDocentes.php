<?php $this->load->view('viewCabeceraLoggin');?>

<div class="container">
	<div id="columnacentral">
		<h2>Verifica si tu Grupo esta aca</h2>
	<?php

		$this->table->set_heading('Nombre', 'Apellido Paterno','Apellido Materno','Grupo de Docente'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="2" cellpadding="2" cellspacing="1" class="table table-hover">'); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

	echo $this->table->generate($docentes); //cuando termina generamos la tabla a partir del vector

	?>
	</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
