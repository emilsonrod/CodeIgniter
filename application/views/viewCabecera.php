<!DOCTYPE html >

<html lang="es">
<head>
    <meta charset='utf-8'>
    
<?php   echo link_tag('css/bootstrap.css'); 
        echo link_tag('css/estilos.css');    
    ?>
    
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
