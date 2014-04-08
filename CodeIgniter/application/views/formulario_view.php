<?php
$estilos = array('class' => 'my_class_css', 'id' => 'nombre_formulario');
 
/*Abrimos la etiqueta <form>*/
echo form_open('controlador/metodo', $estilos);
/*Resultado: <form method="post" action="http://localhost/formularios/index.php/controlador/metodo"  class="my_class_css"  id="nombre_formulario" />*/
/*si queremos usar la equites multipart utilizamos: form_open_multipart()*/
 
/*Vamos a crear uno campos ocultos*/
$datos = array('nombre'  => 'John Doe');
echo form_hidden($datos);
/* Resultado: <input type="hidden" name="nombre" value="John Doe" />*/
 
/*Vamos a crear input de type text*/
$datos = array('name'        => 'username',
              'id'          => 'username',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%');
echo form_input($datos);
/*Resultado: <input type="text" name="username" id="username" value="johndoe" maxlength="100" size="50" style="width:50%" />*/
 
/*creamos un input de type password. puedes agregar los parametros como el ejemplo anterior*/
$datos = array();
echo form_password($datos);
 
/*creamos un input de type file. puedes agregar los parametros como el ejemplo anterior*/
$datos = array();
echo form_upload($datos);
 
/*creamos un input de type texarea. puedes agregar los parametros como el ejemplo anterior*/
$datos = array();
echo form_textarea($datos);
?>
