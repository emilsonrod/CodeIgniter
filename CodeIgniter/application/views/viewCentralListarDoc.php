<div id="columnacentral">
	
	<div id="tituloSubirDoc"><h1>Registrar Archivo :</h1></div>	
	<div id="contenedorSubirDoc">
		<div id = "barra1">
	        <ul>
	        	<li><a href="subirDoc">subir Documento</a></li>
	        </ul>
        </div>		
		<?php
		     if($lista)
		     {
				echo"<table class='ListaArchivo'>";
				echo"<caption>LISTA DE ARCHIVOS</caption>";
				
					echo"<tr>";
						echo "<th width=\"40\">Estado</th>";
						echo "<th width=\"40\">Nombre</th>";
						echo "<th>Descripcion</th>";
						echo "<th width=\"70\" align=\"center\">Descargar/ver</th>";
						echo "<th width=\"40\">Fecha</th>";
						echo "<th align=\"center\">Eliminar</th>";
					echo"</tr>";
				
						foreach ($lista->result() as $row) 
						{	
							echo"<tr>";
								if($row->ESTADO ==1){
									echo"<td align=\"center\"><img src='images/001_18.png' width='20'></td>";
								}else{
									echo"<td><img src='images/001_19.png' width='20'></td>";
								}
							echo"<td>".$row->NOM_DOCUM."</td>";
							echo"<td>".$row->DESCRIPCION."</td>";
								switch ($row->TIPO) 
								{
									case 'pdf':
											echo"<td><a target='_Blank' href='uploads/".$row->NOM_DOCUM."'><img src='images/pdf.png' width='70' height='70'></a></td>";
										break;
									case 'docx':
											echo"<td><a target='_Blank' href='uploads/".$row->NOM_DOCUM."'><img src='images/doc.png' width='70' height='70'></a></td>";
										break;
									case 'txt':
											echo"<td><a target='_Blank' href='uploads/".$row->NOM_DOCUM."'><img src='images/txt.png' width='70' height='70'></a></td>";
										break;
									case 'zip':
											echo"<td><a target='_Blank' href='uploads/".$row->NOM_DOCUM."'><img src='images/zip.png' width='70' height='70'></a></td>";
										break;
									default:
											echo"<td><a target='_Blank' href='uploads/".$row->NOM_DOCUM."'><img src='uploads/".$row->NOM_DOCUM."' width='70' height='70'></a></td>";
										break;
								}
							echo"<td>".$row->FECHA."</td>";
							echo "<td width=\"20\" align=\"center\"><a href=\"listarDoc/eliminarArchivo/".$row->COD_DOCUMEN."\"><img title=\"Borrar\" src=\"images/delete.png\"></a></td>";
							echo"</tr>";
						}
				echo"</table>";
			}else{
				echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
			}
		?>
	</div>
</div>
		
