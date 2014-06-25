<?php $this->load->view('viewCabeceraLoggin');?>

<!--LISTAR DOCUMENTOS GRUPO-->
<div id="columnacentral">

	
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<div id="tituloSubirDoc"><h1></h1></div>	
	<div id="contenedorSubirDoc">	

		<center><h1> Documentos necesarios </h1></center>

		<?php
		
			if($lista)
		     {

				echo"<center><table class='ListaA'>";
				//echo"<caption>DOCUMENTOS NECESARIOS</caption>";

					echo"<tr>";
						//echo "<th width=\"40\">Estado</th>";
						echo "<th width='50%'> Documentos : </th>";
						//echo "<th width='50%'></th>";
						//echo "<th width='15%'></th>";
						//echo "<th width='15%'></th>";
						//echo "<th align=\"center\"></th>";
					echo"</tr>";
					echo"<tr>";
					echo " <td><img src='images/images2.jpg' width='100%' height='2'></td>" ;
					echo"</tr>";
						foreach ($lista->result() as $row) 
						{	
							echo"<tr id = 'descripcion'>";
							echo"<td>".$row->DESCRIPCION."</td>";
							echo"</tr>";
							echo"<tr>";
							echo"<td id = 'descargar'><a href='uploadsDocente/".$row->NOMBRE_DOC."'><img title='Descargar' src='images/descargas.jpg' width='20' height='20'>$row->NOMBRE_DOC</a></td>"; 
							echo"</tr>";

							$originalDate = "". ".$row->FECHA_SUBIDA.";
							setlocale(LC_ALL,"es_ES");
							$newDate = date("l jS \of F Y", strtotime($originalDate));

							echo"<tr>";
							echo " <td><h5 id='fecha'> EL documeto se añadio : ".$newDate."</h5></td>" ;
							echo"</tr>";
							echo"<tr>";
							echo " <td><img src='images/images3.jpg' width='100%' height='2'></td>" ;
							echo"</tr>";
											
							
							//echo"<td><center>".$row->FECHA_SUBIDA."</center></td>";
							
						}
				echo"</table> </center>";
			}else{
				echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
			}

			

		?>
		
</div>
		

<!--FIN-->

<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>