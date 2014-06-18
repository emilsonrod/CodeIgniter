<!DOCTYPE html >

<html lang="es">
<head>
    <meta charset='utf-8'>
    
<?php   echo link_tag('css/bootstrap.css'); 
        echo link_tag('css/estilos.css');
        
    ?>
<!-- Include CSS for color picker plugin (Not required for calendar plugin. Used for example.) -->
<link rel="stylesheet" type="text/css" href="css/colorpicker/colorpicker.css" />

<!-- Include CSS for JQuery UI (Required for calendar plugin.) -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" />

<!--
Include JQuery Core (Required for calendar plugin)
** This is our IE fix version which enables drag-and-drop to work correctly in IE. See README file in js/jquery-core folder. **
-->
<script type="text/javascript" src="js/jquery-core/jquery-1.4.2-ie-fix.min.js"></script>

<!-- Include JQuery UI (Required for calendar plugin.) -->
<script type="text/javascript" src="js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<!-- Include color picker plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/colorpicker/colorpicker.js"></script>

<!--
    (Required for plugin)
    Dependancies for JQuery Frontier Calendar plugin.
    ** THESE MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>

<!-- Include JQuery Frontier Calendar plugin -->
<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.2.min.js"></script>
    
<title>

</title>
<style type="text/css">
        .calendar
        {
            font-family: Arial;
            font-size: 12px;
        }
        table.calendar
        {
            margin: auto;
            border-collapse: collapse;
        }
        .calendar .days td
        {
            width: 80px;
            height: 80px;
            padding: 4px;
            border: 1px solid #999;
            vertical-align: top;
            background-color: #DEF;
        }
        .calendar .days td:hover
        {
            background-color: #FFF;
        }
        .calendar .highlight
        {
            font-weight: bold;
            color: #00F;
        }
    </style>
    <script type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>

        <div id = "cabecera">
                <div id= "ContenidoCabecera">
                    <div id = "barrahorizontal">
                        <ul>
                            <li><a href="inicio">Home</a></li>
                            <li><a href="ingresar">Login</a></li>
                        </ul>
                    </div>
                    <div id = "logotipo">
                        <img src='./images/anka.jpg' width="200px">
                    </div>
                    <div id = "titulo">
                        <h1>Sistema de Apoyo a TIS</h1>
                    </div>
                    <div align="right">
                        <?php             
                    if(isset($this->session->userdata['usuario'])){                    
                    ?>
                    <label>Bienvenido: <?php echo $this->session->userdata('usuario'); ?></php??></label>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div id = "bajo">
