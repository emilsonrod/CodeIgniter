<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">

	
	
	<div id="tituloSubirDoc"><h1></h1></div>	
	<div id="contenedorSubirDoc">	
		<?php
		
			if($lista)
		     {
				echo"<table class='Lista'>";
				echo"<caption>LISTA DE ARCHIVOS</caption>";

					echo"<tr>";
						//echo "<th width=\"40\">Estado</th>";
						echo "<th width='60%'></th>";
						echo "<th width='50%'></th>";
						//echo "<th width='15%'></th>";
						//echo "<th width='15%'></th>";
						//echo "<th align=\"center\"></th>";
					echo"</tr>";
						foreach ($lista->result() as $row) 
						{	
							echo"<tr>";
							//echo"<td>".$row->NOMBRE_DOC."</td>";
							//echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/pdf.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
							/*$archivo = (string)$row->NOMBRE_DOC;
							$tipo = (string)(explode(".", $archivo ));
							
							switch ($tipo) 
								{
									case 'pdf':
											echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/pdf.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
										break;
									case 'docx':
											echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/doc.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
										break;
									case 'doc':
											echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/doc.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
										break;
									case 'xls':
											echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/excel.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
										break;
									case 'xlsx':
											echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/excel.png' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
										break;
								}*/
								echo"<td><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/descargas.jpg' width='20' height='20'>$row->NOMBRE_DOC</a></td>";
							echo"<td>".$row->DESCRIPCION."</td>";
							//echo"<td><center>".$row->FECHA_SUBIDA."</center></td>";
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