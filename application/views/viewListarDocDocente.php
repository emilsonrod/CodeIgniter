<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">

	
	
	<div id="tituloSubirDoc"><h1>DOCUMENTOS :</h1></div>	
	<div id="contenedorSubirDoc">
		<div id = "barra1">
	        <ul>
	        	<li><a href="subirDocDocente">subir Documento</a></li>
	        </ul>
        </div>		
		<?php
		
			if($lista)
		     {
				echo"<table class='ListaArchivo'>";
				echo"<caption>LISTA DE ARCHIVOS</caption>";

					echo"<tr>";
						//echo "<th width=\"40\">Estado</th>";
						echo "<th width='20%'>Nombre</th>";
						echo "<th width='50%'>Descripcion</th>";
						echo "<th width='15%'>Fecha</th>";
						echo "<th width='15%'></th>";
						//echo "<th align=\"center\"></th>";
					echo"</tr>";
						foreach ($lista->result() as $row) 
						{	
							echo"<tr>";
							echo"<td>".$row->NOMBRE_DOC."</td>";
							echo"<td>".$row->DESCRIPCION."</td>";
							echo"<td><center>".$row->FECHA_SUBIDA."</center></td>";
							echo"<td><center><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/Descargar.png' width='30' height='30'></a><a href=listarDoc/eliminarArchivo/".$row->COD_DOC_DOC."><img title='Eliminar' src='images/eliminar.png' width='30' height='30'></a></center></td>";
							echo"</tr>";
						}
				echo"</table>";
			}else{
				echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
			}

			

		?>
		
</div>
		

<!--FIN-->

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>