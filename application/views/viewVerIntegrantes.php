<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<div id="columnacentral">
<?php

	$this->table->set_heading('Nombre', 'Apellidos'); //crea la primera fila de la tabla con el encabezado
	$tmp = array ( 'table_open'  => '<table border="2" cellpadding="2" cellspacing="1">' ); //modifica el espaciado
	$this->table->set_template($tmp); //aplico los cambios de modificacion anterior

echo $this->table->generate($integrantes); //cuando termina generamos la tabla a partir del vector

?>
</div>

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
