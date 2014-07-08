<?php $this->load->view('viewCabeceraLoggin');?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">

	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	
	<div id="tituloSubirDoc"><h1>Avisos :</h1></div>	
	<div id="contenedorSubirDoc">
		<div id = "barra1">
	        <ul>
	        	
	        	<!--li><a href="subirDocEst">subir Documento</a></li-->
	        </ul>
        </div>		
		<?php
		
			if($lista)
		     {
				echo"<table class='ListaMensajes'>";
				//echo"<caption>LISTA DE ARCHIVOS</caption>;
					foreach ($lista->result() as $row) 
						{	
								$originalDate = "". ".$row->FECHA_PUBLICACION.";
								setlocale(LC_ALL,"es_ES");
								$newDate = date("g:ia \ \n l jS F Y", strtotime($originalDate));

							echo "<div id = 'de'>";
								echo"Publicado el : ".$newDate."";
							echo "</div>";

							echo "<p>";
							echo "<div id = 'mensaje'>";
								echo "<p>";
									echo"   ".$row->MENSAJE."";
								echo "</p>";
								echo "<div id = 'textFecha'>";
									//echo"<a href=enviarSms><img title='Eliminar' src='images/responder.gif'  VSPACE = ''align = 'right'></a>";
								echo "</div>";
							echo "</div>";
							echo "</p>";
							
						}
			}else{
				echo"<div id='mensajevacio' align=\"center\">No hay avisos por el momento</div>";
			}

		?>
		
</div>

<!--FIN-->

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>