<?php $this->load->view('viewCabecera');?>
<?php $this->load->view('viewIzquierda',$tareas);?>
<div id="columnacentral">
	
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
					<?php echo $error;?>
				</fieldset>

				<fieldset>
				<legend>Elegir documento:</legend>
					<span>El formato de los archivos permitidos son .pdf,.doc </span><br/>
					<span>El tamaño permitido es de 20 mb.</span>
					<p>
						<input type="file" name="userfile" id="userfile"/>
					<p/>
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