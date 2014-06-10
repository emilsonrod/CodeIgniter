<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>
<div id="columnacentral">
	
	<h1>Subir documento docente</h1>
<!--SUBIR DOCUMENTOS-->
	<div id="contenedorSubirDoc">		
		<div id="formsubirDoc"></div>
		     <?php echo form_open_multipart('subirDocDocente');?>
				<?php echo $error;?>
				<fieldset>
				<legend>Elegir documento:</legend>
					<span>El formato de los archivos permitidos son .pdf,.doc </span><br/>
					<span>El tamaño permitido es de 20 mb.</span>
					<p>

						<input type="file" name="userfile" id="userfile"/>
						<h5><?php echo form_error('userfile');?></h5>
					<!--?php echo form_input(array('id' => 'archivoUsuario', 'type' => 'file', 'name' => 'archivoUsuario' ))?-->
					<p/>
				</fieldset>
				<fieldset>
				<legend>Descripcion del documento:</legend>
				<span>Numero de caracteres permitidos 150.</span><br/>
					
					<?php echo form_textarea(array('class' =>'cajas' ,'name' => 'txtdes' ,'maxLength' => '150', 'id' => 'txtdes', 'style' =>'width:400px; height:50px'))?>
					<br/>
					<h5><?php echo form_error('txtdes');?></h5>
				
				</fieldset>
				<div aling="right">
				<input class = "button" type="submit" name="submit" value="Subir Documento" />
			</div>
			</form>
		</div>
		<div id = "barra1">
	        <ul>
	        	<li><a href="listarDoc">Listar Documentos</a></li>
	        </ul>
       </div> 
	</div>
<!--FIN-->
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>