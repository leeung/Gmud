<?php 
require_once 'conexao.php';
?>


<!DOCTYPE html>
<html lang="PT-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/gmud.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="corpo">
  
 	<div class="container">
 		<div class="row topo">
 			<img class="col-xs-2" src="imagens/logocf.png">
 			<div class="col-xs-8 text-center"><h1>Controle de GMUD</div>
 		</div>
 		<br/>
 		<nav>
		 	<ul class="nav nav-pills">
		 		<li><a role="presentation" href="index.php">GMUD</a></li>
		 		<li><a href="index.php?pagina=criar">NOVO</a></li>
		 	</ul>
	 	</nav>
 	</div>
 	
 	<?php 
 	
 	isset($_GET['pagina'])? $pagina = $_GET['pagina'] : $pagina = "listar";
 	
 	require_once $pagina . 'Gmud.php';?>
 	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>