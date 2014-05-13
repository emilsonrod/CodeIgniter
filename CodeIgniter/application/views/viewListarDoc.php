<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda');?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">
	
	<div id="tituloSubirDoc"><h1>Documentos subidos por el grupo :</h1></div>	
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
						echo "<th width=\"20\">Nombre</th>";
						echo "<th>Descripcion</th>";
						echo "<th width=\"70\" align=\"center\">Descargar/ver</th>";
						echo "<th width=\"40\">Fecha</th>";
						echo "<th align=\"center\">Eliminar</th>";
					echo"</tr>";
				
					/*echo"<tr>";
						echo "<th width='10%'>Estado</th>";
						echo "<th width='10%'>Nombre</th>";
						echo "<th width='30%'>Descripcion</th>";
						echo "<th width='15%'>Descargar/ver</th>";
						echo "<th width='15%'>Fecha</th>";
						echo "<th width='10%'>Eliminar</th>";
					echo"</tr>";*/
				
						foreach ($lista->result() as $row) 
						{	
							echo"<tr>";
								if($row->ESTADO ==1){
									echo"<td align=\"center\"><img src='images/001_18.png' width='20'></td>";
								}else{
									echo"<td><img src='images/001_19.png' width='20'></td>";
								}
							echo"<td>".$row->NOMBRE_DOC."</td>";
							echo"<td>".$row->DESCRIPCION."</td>";
								switch ($row->TIPO) 
								{
									case 'pdf':
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='images/pdf.png' width='35' height='35'></a></center></td>";
										break;
									case 'docx':
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='images/doc.png' width='35' height='35'></a></center></td>";
										break;
									case 'txt':
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='images/txt.png' width='35' height='35'></a></center></td>";
										break;
									case 'zip':
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='images/zip.png' width='35' height='35'></a></center></td>";
										break;
									case 'ZIP':
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='images/zip.png' width='35' height='35'></a></center></td>";
										break;
									default:
											echo"<td><center><a target='_Blank' href='uploads/".$row->NOMBRE_DOC."'><img src='uploads/".$row->NOMBRE_DOC."' width='35' height='35'></a></center></td>";
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
		

<!--FIN-->

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>