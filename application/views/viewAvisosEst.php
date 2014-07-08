<?php $this->load->view('viewCabeceraLoggin');?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">

	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	
	<div id="tituloSubirDoc"><h1>Mensajes Enviados :</h1></div>	
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
							echo "<div id = 'para'>";
								echo"   Para : ".$row->NOMBRE_GRUPO."";
							echo "</div>";
							echo "<p>";
							echo "<div id = 'mensaje'>";
								$originalDate = "". ".$row->FECHA_PUBLICACION.";
								setlocale(LC_ALL,"es_ES");
								$newDate = date("g:ia \ \n l jS F Y", strtotime($originalDate));
								echo "<p>";
									echo"   ".$row->MENSAJE."";
								echo "</p>";
								echo "<div id = 'textFecha'>";
									echo"Publicado el : ".$newDate."";
									echo"<a href=verMensajesEst/eliminarAviso/".$row->ID_AVISO."><img title='Eliminar' src='images/eliminar.png' width='30' height='30' VSPACE = ''align = 'right'></a>";
								echo "</div>";
							echo "</div>";
							echo "</p>";
							
						}
			}else{
				echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
			}

		?>
		
</div>

<!--FIN-->

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>