<div id="columnacentral">
    <div id="cabeceraDoc"><h1></h1></div>
    <div id="contenedor">
    	<div id="nuevaimagen"></div>
			<script type="text/javascript" src="js/nuevaimagencsv.js"></script>
			<link href="estilos/estilos.css" rel="stylesheet" type="text/css" />
			<form>
			<div class="formulario-title"><span >Registrar Estudiantes:</span></div>
			<div ><div ><div >
			<table >
				<tr>
			        <td height="71">
			        <fieldset>
			        <legend>Elegir archivo :</legend>
			        <input id="file_upload" type="file" name="file_upload" placeholder="elija el archivo"/>
			        <h5 style="color:#666;font-size:12px;font-family:Tahoma, Geneva, sans-serif">Solo se permiten archivos .csv.<br />Tamanio permitido 20 mb.</h5>
			        </fieldset>
			        </td>
			     </tr>
			</table>
			</div></div></div>
			<div align="right">
			<input class="button" type="button" value="agregar estudiantes" onclick="javascript:startUpload('file_upload', document.getElementById('txtdes'))"/>&nbsp;&nbsp;
			</div>
			</form>
        <div id="listadoimagenes"></div>
		<!-- Libreria JQuery -->
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

        <!--PARA SUBIR ARCHIVOS -->
        <link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
        <script type="text/javascript" src="uploadify/jquery.uploadify.js"></script>

        <!--FUNCIONES GENERALES -->

		<link href="estilos/estilos.css" rel="stylesheet" type="text/css" />

    </div>
</div>
