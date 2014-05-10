<html>
<head>
<title>Subir Archivos</title>
</head>
<body>   
<?=heading('Suba un archivo zip, rar, pdf, docx o txt', 3);?>
<?=$error;?>
<?=form_open_multipart('files/do_upload');?>
<input type="file" name="userfile" size="20" />
<br />
<input type="submit" value="Cargar Archivo .CSV" />
<?=form_close()?>
<h5><?=br(1).anchor('files/info', 'Listado de archivos para descargar'); ?></h5>
</body>
</html>