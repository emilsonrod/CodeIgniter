<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
	<div class="navbar-collapse collapse center-block">	
 <div class='conteiner'>
	<p>
		<h3>Nombre corto del grupo</h3>
	</p>
	<p>
		<div>
			<?php
				echo form_label( $nombreCorto);
			?>
		</div>
	</p>
	<p>
		<h3>Nombre Largo del grupo</h3>
	</p>

	<div>
		<?php
			echo form_label( $nombreLargo);
		?>
	</div>
</div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>