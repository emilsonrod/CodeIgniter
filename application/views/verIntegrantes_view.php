<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">
<p>
<div>
<?php
	echo form_label( $nombreCorto);
?>
</div>
</p>

<div>
<?php
	echo form_label( $nombreLargo);
?>
</div>
<p>
<?php
 	echo form_label('Integrantes', 'integrantes');
?>
</p>
<?php

	$this->table->set_heading('Nombre', 'Apellidos'); //crea la primera fila de la tabla con el encabezado
	$tmp = array ( 'table_open'  => '<table border="2" cellpadding="2" cellspacing="1">' ); //modifica el espaciado
	$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

echo $this->table->generate($integrantes); //cuando termina generamos la tabla a partir del vector
?>
<p>
<?php
	echo form_label('Documentos', 'documentos');
?>
</p>
<?php

	$this->table->set_heading('Documentos'); //crea la primera fila de la tabla con el encabezado
	$tmp = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1">' ); //modifica el espaciado
	$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

	echo $this->table->generate($documentos); //cuando termina generamos la tabla a partir del vector
?>

</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
