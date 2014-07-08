<?php $this->load->view('viewCabeceraLogginDocente');?>
<div id="columnacentral">
<div class="navbar-collapse collapse center-block">

<script>
function checkFile(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        var FileSizeMB = (FileSize/10485760).toFixed(2);
        var objErrDiv = document.getElementById('divError');

        if ( (FileExt != "pdf" && FileExt != "xls" && FileExt != "xlsx") )
        {
        	var error = "Extension del archivo: " + " ' "+ FileExt +" ' "+ "\n\n";
            error += "Elija un archivo con el formato permitido.\n\n";

        	objErrDiv.innerHTML= error;
	        objErrDiv.style.padding='4px 4px';
	        objErrDiv.style.visibility='visible';
	        objErrDiv.style.margin='10px 0px 2px 0px';
	        return false;
	        /*

            var error = "File type : "+ FileExt+"\n\n";
            error += "Size: " + FileSizeMB + " MB \n\n";
            error += "Please make sure your file is in pdf or doc format and less than 10 MB.\n\n";
            alert(error);
            return false;*/
        }
	    else
	    {
	    	if(FileSize>10485760)
	    	{
	    		var error = "Tamaño: " + " ' " + FileSizeMB + " ' " + " MB \n\n";
	            error += "El tamaño permitido es de 10Mb.\n\n";

	        	objErrDiv.innerHTML= error;
		        objErrDiv.style.padding='4px 4px';
		        objErrDiv.style.visibility='visible';
		        objErrDiv.style.margin='10px 0px 2px 0px';
		        return false;
	    	}
	    	else
	    	{
	    		objErrDiv.innerHTML="";  // Try adding this
	        	return false;
	    	}
	    }
	        
    }
	 var textareaContent = "" ; 
			var numCaracteresValidos = 150;

			function validar_long(){ 
			   var numCaracteresIntro = document.forms[0].txtdes.value.length; 

			   if (numCaracteresIntro > numCaracteresValidos){ 
			      document.forms[0].txtdes.value = textareaContent; 
			   }else{ 
			      textareaContent = document.forms[0].txtdes.value;	
			   } 

			   if (numCaracteresIntro >= numCaracteresValidos){ 
			      document.forms[0].caracteres.style.color="#ff0000"; 
			   }else{ 
			      document.forms[0].caracteres.style.color="gray"; 
			   } 

			   score() 
			} 

			function score(){ 
			   document.forms[0].caracteres.value=document.forms[0].txtdes.value.length; 
			} 
</script>

	<h1>Subir documento </h1>
<!--SUBIR DOCUMENTOS-->
	<div id="contenedorSubirDoc">		
		
		     <?php echo form_open_multipart('subirDocDocente',array('class'=>"navbar-form navbar-center", 'role'=>"form-horizontal"));?>

					<fieldset>
						</br>
						<?php echo form_label('  Archivo :');?></br>
						<p>
						<span>El formato de los archivos permitidos son ".pdf",".xls" </span><br/>
						<span>El tamaño permitido es de 10 Mb.</span>
						</p>
						<input type="file" name="userfile" id="userfile" onchange="checkFile(this)"/>
						<div id="divError"><?php echo form_error('userfile');?></div>
						<div id="divError"><?php echo $error;?></div>
						<div id="divError" class="divError"></div>

					</fieldset>
					<fieldset>
						</br>
						<?php echo form_label('  Descripcion:');?></br>
						<span>Numero de caracteres permitidos 150.</span><br/>
						<input class="control-input" type="text" name="caracteres" value = "0" readOnly size=2><br/>
						<textarea class = "form-control" name="txtdes" id = "txtdes" maxLength = "150" onKeyDown="validar_long()" onKeyUp="validar_long()" style = "width:400px; height:80px"></textarea> 
						
						<br/>
						<div id="divError"><?php echo form_error('txtdes');?></div>
					
					</fieldset><br/>
				
					<div aling="right">
					<input class = "btn btn-primary" type="submit" name="submit" value="Subir Documento" />
					</div>
			</form>
		</div>
		<div id = "barra1">
	        <ul>
	        	<li><a href="listarDoc">Listar Documentos</a></li>
	        </ul>
       </div> 
       <?php $this->load->view('viewDerecha');?>
		<?php $this->load->view('viewPiePagina');?>
	</div>
	</div>
<!--FIN-->
