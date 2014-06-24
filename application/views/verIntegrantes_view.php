<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
	<p>
		<div>
			<?php
				//echo form_label( $nombreCorto);
			?>
		</div>
	</p>

	<div>
		<?php
			//echo form_label( $nombreLargo);
		?>
	</div>
	<p>
		<h1>Integrantes del Grupo</h1>
	</p>
	<?php

		$this->table->set_heading('Nombre', 'Apellido_Paterno','Apellido_Materno'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="3" cellpadding="3" cellspacing="1" class="table table-hover">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

		echo $this->table->generate($integrantes); //cuando termina generamos la tabla a partir del vector
	?>
	<p>
		<?php
		//	echo form_label('Documentos', 'documentos');
		?>	
	</p>
	<?php

		/* $this->table->set_heading('Documentos'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="2" cellpadding="2" cellspacing="1">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

		echo $this->table->generate($documentos); //cuando termina generamos la tabla a partir del vector*/
	?>

</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
