

<div id="columnacentral">
	
			<!-- CSS -->
		<link rel="stylesheet" href="estilos/estilos.css" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" >

		<!-- Libreria JQuery -->
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script><!--se modifica por la version de jquery que tengan -->
        
        <!--PARA SUBIR ARCHIVOS -->
        <link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
		<script type="text/javascript" src="uploadify/jquery.uploadify.js"></script>
		
<script type="text/javascript">
	$(document).ready(function() 
	{	
	    $("#file_upload").fileUpload({
	        'uploader': 'uploadify/uploader.swf',
	        'cancelImg': 'uploadify/cancel.png',
	        'script': 'subirDoc/agregarDoc',
	
	        'folder': 'uploads',
	        'buttonText': 'Examinar',
	        'checkScript': 'uploadify/check.php',
	        'fileDesc': 'Archivos',
	        'auto':false,
	        //Estensiones permitidas para carga de los archivos
	        //'fileExt': '*.jpg;*.jpeg;*.gif;*.png;*.xlsx;*.docx;*.html;*.txt;*.pdf;*.zip',
	        'fileExt': '*.docx;*.txt;*.pdf;*.zip',
			
			//Puede ingresar mas de 1 archivo a la vez, false solo 1 archivo
	        'multi': true,
	        'displayData': 'percentage',
	        /*onComplete: function (){
	     verlistadoimagenes();
	            $("#txtdes").val('');
	        }*/
	
	       });
	   $('#txtdes').bind('change', function(){
		$('#file_upload').fileUploadSettings('scriptData','&des='+$(this).val());
	
	
	    });
	
	})
	
	function startUpload(id, conditional){
		if(conditional.value.length != 0) {
			$('#'+id).fileUploadStart();
		} else
			alert("Debe ingresar una descripcion");
	}

</script>
	
	<div id="tituloSubirDoc"><h1>Registrar Archivo :</h1></div>	
	<div id="contenedorSubirDoc">		
		<div id="formsubirDoc"></div>
		     <form>
				<fieldset>
					<legend>Descripcion del documento:</legend>
					<textarea class="cajas" cols="" name="txtdes" id="txtdes" style="width: 400px;height: 80px" ></textarea>
					<!--?php echo form_textarea(array('class' =>'subirDocDesc' ,'name' => 'txtDesc' , 'id' => 'txtDesc', 'style' =>'width:400px;height:80px'))?-->
				</fieldset>
				<fieldset>
					<legend>Elegir Archivo :</legend>
					<input id="file_upload" type="file" name="file_upload" />
					<!--?php echo form_input(array('id' => 'archivoUsuario', 'type' => 'file', 'name' => 'archivoUsuario', 'size'=>'20' ))?-->
				</fieldset>
				<div aling="right">
					<input class="button" type="button" value="Cargar" onclick="javascript:startUpload('file_upload', document.getElementById('txtdes'))"/>
					<!--?php echo form_submit('regDoc', 'Subir Documento')?-->
				</div>
			</form>
		</div>
		<div id = "barra1">
	        <ul>
	        	<li><a href="listarDoc">Listar Documentos</a></li>
	        </ul>
       </div> 
	</div>
		
