<?php $this->load->view('viewCabeceraLoggin');?>
<div id="columnacentral">
<div class="navbar-collapse collapse center-block">
<script>
function checkFile(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        var FileSizeMB = (FileSize/20971520).toFixed(2);
        var objErrDiv = document.getElementById('divError');

        if ( (FileExt != "zip") )
        {
        	var error = "Extension del archivo: "+ " ' " + FileExt+ " ' " +"\n\n";
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
	    	if(FileSize>20971520)
	    	{
	    		var error = "Tamaño: " + " ' " + FileSizeMB + " ' " +"MB \n\n";
	            error += "El tamaño permitido es de 20Mb.\n\n";

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


	<h1>Subir hito</h1>
<!--SUBIR HITOS-->
	<div id="contenedorSubirDoc">		
		<div id="formsubirDoc"></div>
		     <?php echo form_open_multipart('subirHito');?>
				
		     	<fieldset>
		     	
					</br>
						<?php echo form_label('  Eventos recientes:   ', 'fecha');?></br>
   				 		<?php echo form_dropdown('fecha', $lista, set_value('fecha')); ?>
   				 	</br>
				</fieldset>

				<fieldset>
				</br>
					<?php echo form_label('  Archivo :');?></br>
					<span>El formato de los archivos permitidos son .zip </span></br>
					<span>El tamaño permitido es de 20 mb.</span>
					<p>
						<input type="file" name="userfile" id="userfile" onchange="checkFile(this)"/>
					<p/>
					<div id="divError"> <h5><?php echo form_error('userfile');?></h5></div>
					<div id="divError"><?php echo $error;?></div>
					<div id="divError" class="divError"></div></br>
				</fieldset>
				<fieldset>
				<!--legend>Descripcion del hito:</legend-->
				<?php echo form_label('Descripcion: ');?></br>
				<span>Numero de caracteres permitidos 150.</span><br/>
					<?php echo form_textarea(array('class' =>'cajas' ,'name' => 'txtdes' ,'maxLength' => '150', 'id' => 'txtdes', 'style' =>'width:400px; height:80px'))?>
					<br/>
					<div id="divError"><h5><?php echo form_error('txtdes');?></h5></div>
				</fieldset>
				<div aling="right">
				<input class = "button" type="submit" name="submit" value="Subir Documento" />
			</div>
			</form>
		</div>
		<div id = "barra1">
	        <ul>
	        	<li><a href="listarHito">Listar Documentos</a></li>
	        </ul>
       </div> 
      <?php $this->load->view('viewDerecha');?>
		<?php $this->load->view('viewPiePagina');?>
	</div>
</div>

<!--FIN-->

</div>


 
