<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
	<div class="container">
		<div class="panel panel-primary">
    	<div class="panel-heading" align="center">Documentos</div>
		<div class="panel-body">
        <div class="table">
<p>
		<?php
			echo form_label('Documento A', 'documento A');
		?>	
</p>

	<?php

		$this->table->set_heading('Documento A','Fecha'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="5" cellpadding="2" cellspacing="10" class="table table-hover">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

		echo $this->table->generate($documentoA); //cuando termina generamos la tabla a partir del vector
	?>
<p>
		<?php
			echo form_label('Documento B', 'documento B');
		?>	
</p>
	<?php

		$this->table->set_heading('Documento B','Fecha'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="5" cellpadding="2" cellspacing="10" class="table table-hover">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

		echo $this->table->generate($documentoB); //cuando termina generamos la tabla a partir del vector
	?>

	<p>
		<?php
			echo form_label('Documento General', 'documento General');
		?>	
	</p>
	<?php

		$this->table->set_heading('Documento General','Fecha','Comentario'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="5" cellpadding="3" cellspacing="10" class="table table-hover">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

		echo $this->table->generate($documentoGeneral); //cuando termina generamos la tabla a partir del vector
	?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>