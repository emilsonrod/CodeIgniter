<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>
<div id="columnacentral">
	<p>
		<?php
			echo form_label('Nombre Corto', 'nombre corto');
		?>	
	</p>
	<p>
		<div>
			<?php
				echo form_label( $nombreCorto);
			?>
		</div>
	</p>
	<p>
		<?php
			echo form_label('Nombre Largo', 'nombre Largo');
		?>	
	</p>

	<div>
		<?php
			echo form_label( $nombreLargo);
		?>
	</div>


</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>