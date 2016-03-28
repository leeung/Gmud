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
	 								$situacao = mysqli_fetch_assoc($resultSituacao);
	 				?>
					<?php if($situacao['descricao'] != 'Aberto') $btnAlterar= "false"; else $btnAlterar= "true"; ?>	
	 						
	 				<tr>
	 					<td><?=$gmud['id']?></td>
	 					<td><?=$gmud['objetivo']?></td>
	 					<td><?=$gmud['respMudanca']?></td>
	 					<td><?=$gmud['dataCriacao']?></td>
	 					<td class="text-center">
	 						<a class="btn" href="index.php?pagina=visualizar&id=<?=$gmud['id']?>"  >
	 							<span class="glyphicon glyphicon-eye-open" area-hidden="true"></span>
	 						</a>
	 					</td>
	 					
	 					<td class="text-center">						
							<a class="btn" onclick="return <?=$btnAlterar?>" href="alterarGmud.php?id=<?=$gmud['id'] ?>">
	 								<span class="glyphicon glyphicon-pencil" area-hidden="true"></span>
	 						</a>
	 					</td>
	 					
	 					<td class="text-center">
 								<?php if($situacao['descricao'] == 'Aberto') :?>
			 						<a href="fecharGmudLogic.php?id=<?= $gmud['id'] ?>"><span class="glyphicon glyphicon-remove" area-hidden="true" alt="Fechar"></span></a>
		 						<?php elseif($situacao['descricao'] == 'Executada'):?>
		 							<span class="glyphicon glyphicon-lock" area-hidden="true" alt="Fechado"></span>
		 						<?php elseif($situacao['descricao'] == 'Cancelado'):?>
		 							<span class="glyphicon glyphicon-lock" area-hidden="true" alt="Fechado"></span>
		 						<?php endif;?>
	 					</td>
	
	  				</tr>
	 				<?php endwhile;?>
	 			</tbody>
	 			
	 			
	 		</table>
	 	</div>
 	
 	</div>
 	