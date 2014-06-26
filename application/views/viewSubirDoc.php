<?php $this->load->view('viewCabeceraLoggin');?>
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

        if ( (FileExt != "pdf") )
        {
        	var error = "Extension del archivo: "+"' " + FileExt+ " '    "+ "\n\n";
            error += "Elija un archivo con el formato requerido.\n\n";

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
	    		var error = "Tamaño: " + " ' "+ FileSizeMB + " '   "+ " MB \n\n";
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
		
			<?php echo form_open_multipart('subirDocEst');?>
					<fieldset>
						</br>
							<p>
							<?php echo form_label('Eventos recientes:', 'fecha');?></br>
	   				 		<?php echo form_dropdown('fecha', $lista, set_value('fecha')); ?>
						<p/>
						
					</fieldset>

					<fieldset>
						</br>
						<?php echo form_label('Archivo :', 'fecha');?></br>
						<span>El formato de los archivos permitidos es ".pdf" </span><br/>
						<span>El tamaño permitido es de 10 Mb.</span>
						<p>
							<input type="file" name="userfile" id="userfile" onchange="checkFile(this)"/>
						<p/>
						<div id="divError"><h5><?php echo form_error('userfile');?></h5> </div>
						<div id="divError"><?php echo $error;?></div>
						<div id="divError" class="divError"></div>
				</fieldset>
				<fieldset>
				</br>
					<?php echo form_label('Descripcion :', 'fecha');?></br>
					<span>Numero de caracteres permitidos 150.</span><br/>
					<?php echo form_textarea(array('class' =>'cajas' ,'name' => 'txtdes' ,'maxLength' => '150', 'id' => 'txtdes', 'style' =>'width:400px; height:80px'))?>
					<br/>
					<div id="divError"><h5><?php echo form_error('txtdes');?></h5> </div>
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
		      		 <?php $this->load->view('viewDerecha');?>
					<?php $this->load->view('viewPiePagina');?>	
		</div>
	</div>
	</div>

