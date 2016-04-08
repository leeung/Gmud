<?php 	
$listaGmud = "Select * from gmud";
$result = mysqli_query($link, $listaGmud);
?>

	
 	<div class="container">
 		<div class="table-responsive">
	 		<table class="table table-striped">
	 			<thead>
	 				<tr>
	 					<th>ID</th>
	 					<th>OBJETIVO</th>
	 					<th>RESPONSÁVEL</th>
	 					<th>CRIADO EM</th>
	 					<th></th><!-- ABERTO/CANCELADA/EXECUTADA -->
	 					<th></th>
	 					<th></th>
	 					<th></th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php while ($gmud = mysqli_fetch_assoc($result)): ?>
	 				
	 				<?php 	$resultSituacao = mysqli_query($link, "select descricao from situacaogmud where id={$gmud['situacao']}");
	 								$gmud['situacao'] = mysqli_fetch_assoc($resultSituacao)['descricao'];
	 				?>	
					<?php 
					$btnView = "true";
					$btnRun = "false";
					$btnEdit = "false";
					$btnClose = "false";
					
					switch ($gmud['situacao']){
						case "Aberto":
							$btnRun = "true";
							$btnEdit = "true";
							break;
						case "Cancelado":
							break;
						case "Executada":
							break;
						case "Andamento":
							$btnClose = "true";
							break;
					}

					?>	
	 						
	 				<tr>
	 					<td><?=$gmud['id']?></td>
	 					<td><?=$gmud['objetivo']?></td>
	 					<td><?=$gmud['respMudanca']?></td>
	 					<td><?=$gmud['dataCriacao']?></td>
	 					<td><?=$gmud['situacao']?></td>
	 					
	 					<td class="text-center">
	 						<a class="btn" onclick="return <?=$btnRun?>" href="executarGmudLogic.php?id=<?=$gmud['id']?>"  >
	 							<span class="glyphicon glyphicon-hourglass" area-hidden="falue"></span><br/>Run
	 						</a>
	 					</td>
	 					
	 					<td class="text-center">
	 						<a class="btn" href="index.php?pagina=visualizar&id=<?=$gmud['id']?>"  >
	 							<span class="glyphicon glyphicon-eye-open" area-hidden="true"></span><br/>View
	 						</a>
	 					</td>
	 					
	 					<td class="text-center">						
							<a class="btn" onclick="return <?=$btnEdit?>" href="alterarGmud.php?id=<?=$gmud['id'] ?>">
	 							<span class="glyphicon glyphicon-pencil" area-hidden="true"></span><br/>Edit
	 						</a>
	 					</td>
	 					
	 					<td class="text-center">						
							<a class="btn" onclick="return showPopUpFechamento(<?=$btnClose?>,<?= $gmud['id'] ?> );" href="">
	 							<span class="glyphicon glyphicon-remove" area-hidden="true"></span><br/>Close
	 						</a>
	 					</td>
	
	  				</tr>
	 				<?php endwhile;?>
	 			</tbody>
	 			
	 			
	 		</table>
	 	</div>
 	
 	</div>
 	