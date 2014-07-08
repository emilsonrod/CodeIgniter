<?php $this->load->view('viewCabeceraLogginDocente2');?>
<div id="columnacentral">
	<div class="navbar-collapse collapse center-block">	
 <div class='conteiner'>
 	<fieldset>
	<span style=";font-family:comic sans ms;font-size:18px;color:blue;" align="center">NOMBRE CORTO DE GRUPO-EMPRESA</span>
	<p>
	<span style=";font-family:comic sans ms;font-size:18px;color:black;" align="center" >
			<?php
				echo form_label( $nombreCorto);
			?>
		</span>
	</p>
</fieldset>
	<span style=";font-family:comic sans ms;font-size:18px;color:blue;" align="center">NOMBRE LARGO DE GRUPO-EMPRESA</span>
	<p>
	<span style=";font-family:comic sans ms;font-size:18px;color:black;" align="center">
		<?php
			echo form_label( $nombreLargo);
		?>
	</span>
</p>
</div>
</div>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>