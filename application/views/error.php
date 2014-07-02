<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" /> 
		
		<link rel="shortcut icon" href="./assets/ico/favicon.ico">

		<title>Sistema de ayuda a TIS</title>

		<!-- Bootstrap core CSS -->
		<link href="./css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="./css/jumbotron.css" rel="stylesheet">
		<link href="./css/carousel.css" rel="stylesheet">
		
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div>
</div>				



<div id="columnacentral">

    <h2>Error</h2>
    <span><?php echo $error; ?></span>


</div>
<div id="columnaizquierda">
	<ul class="pager">
  <li class="previous"><a href="inicio" > &larr; Anterior</a></li>
</ul>
</div>
<?php $this->load->view('viewDerecha');?>
<?php $this->load->view('viewPiePagina');?>
