<?php 
require_once 'conexao.php';
	
$listaGmud = "Select * from gmud";
$result = mysqli_query($link, $listaGmud);
?>


<!DOCTYPE html>
<html lang="en">
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
 	<div class="container">
 		<nav>
		 	<ul class="nav nav-pills">
		 			<li><a href="gmudNovo.php">Nova GMUD</a></li>
		 	</ul>
	 	</nav>
 	</div>
 	
 	<div class="container">
 		<table class="table table-strapad">
 			<thead>
 				<tr>
 					<th>ID</th>
 					<th>OBJETIVO</th>
 					<th>RESPONSÁVEL</th>
 					<th>CRIADO EM</th>
 					<th>SITUAÇÃO</th><!-- ABERTO/CANCELADA/EXECUTADA -->
 					<th></th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php while ($gmud = mysqli_fetch_assoc($result)): ?>
 				<tr>
 					<td><?=$gmud['id']?></td>
 					<td><?=$gmud['objetivo']?></td>
 					<td><?=$gmud['respMudanca']?></td>
 					<td><?=$gmud['dataCriacao']?></td>
 					<td>
 						<?php $resultSituacao = mysqli_query($link, "select descricao from situacaogmud where id=1");
 							$situacao = mysqli_fetch_assoc($resultSituacao);
 							echo $situacao['descricao'];
 						?>
 					</td>
 					<td><a href="VisualizarGmud.php">Ver</a></td>
 				</tr>
 				<?php endwhile;?>
 			</tbody>
 			
 			
 		</table>
 	
 	</div>
 	
 	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>