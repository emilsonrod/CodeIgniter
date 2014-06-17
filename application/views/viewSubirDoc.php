<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>
<div id="columnacentral">

<script>
function checkFile(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        var FileSizeMB = (FileSize/10485760).toFixed(2);
        var objErrDiv = document.getElementById('divUploadCheckError');

        if ( (FileExt != "pdf" && FileExt != "doc" && FileExt != "docx") )
        {
        	var error = "Extension del archivo: "+ FileExt+"\n\n";
            error += "El tipo de archivo permitido es pdf.\n\n";

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
	    		var error = "Tamaño: " + FileSizeMB + " MB \n\n";
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
    
</script>
	
	<h1>Subir documento</h1>
	<div id="contenedorSubirDoc">	

		<div id="formsubirDoc"></div>
		
			<?php echo form_open_multipart('subirDocEst');?>
				<fieldset>
					<legend>Elegir evento :</legend>
						<p>
						<?php echo form_label('Eventos recientes:', 'fecha');?>
   				 		<?php echo form_dropdown('fecha', $lista, set_value('fecha')); ?>
					<p/>
					
				</fieldset>

				<fieldset>
				<legend>Elegir documento:</legend>
					<span>El formato de los archivos permitidos son .pdf,.doc </span><br/>
					<span>El tamaño permitido es de 20 mb.</span>
					<p>
						<input type="file" name="userfile" id="userfile" onchange="checkFile(this)"/>
					<p/>
					<h5><?php echo form_error('userfile');?></h5>
					<?php echo $error;?>
					<div id="divUploadCheckError" class="divError"></div>
			</fieldset>
			<fieldset>
				<legend>Descripcion del documento:</legend>
				<span>Numero de caracteres permitidos 150.</span><br/>
				<?php echo form_textarea(array('class' =>'cajas' ,'name' => 'txtdes' ,'maxLength' => '150', 'id' => 'txtdes', 'style' =>'width:400px; height:80px'))?>
				<br/>
				<h5><?php echo form_error('txtdes');?></h5>
			</fieldset>
			<div aling="right">
				<input class = "button" type="submit" name="submit" value="Subir Documento" />
			</div>
			</form>
			<div id = "barra1">
	        <ul>
	        	<li><a href="listarDocEst">Listar Documentos</a></li>
	        </ul>
       </div>
			
			
		</div> 
	</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>