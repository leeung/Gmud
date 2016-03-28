<?php 	
$listaGmud = "Select * from gmud";
$result = mysqli_query($link, $listaGmud);
?>

	
 	<div class="container">
 		<table class="table table-strapad">
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
 				<tr>
 					<td><?=$gmud['id']?></td>
 					<td><?=$gmud['objetivo']?></td>
 					<td><?=$gmud['respMudanca']?></td>
 					<td><?=$gmud['dataCriacao']?></td>
 					<td class="text-center"><a  href="index.php?pagina=visualizar&id=<?=$gmud['id'] ?>"><span class="glyphicon glyphicon-eye-open" area-hidden="true"></span><br/>Ver</a></td>
 					<td class="text-center"><a href="alterarGmud.php?id=<?=$gmud['id'] ?>"><span class="glyphicon glyphicon-pencil" area-hidden="true"></span><br/>Editar</a></td>
 					<td class="text-center">
 						<?php $resultSituacao = mysqli_query($link, "select descricao from situacaogmud where id=1");
 							$situacao = mysqli_fetch_assoc($resultSituacao);
 						?>
 						<?php if($situacao == 1) :?>
	 						Fechado
	 						<span class="glyphicon glyphicon-lock" area-hidden="true" alt="Fechado"></span><br/>Fechado
 						<?php else:?>
 							<a href="fecharGmudLogic.php?id=<?=$gmud['id'] ?>"><span class="glyphicon glyphicon-remove" area-hidden="true" alt="Fechar"></span><br/>Fechar</a>
 						<?php endif;?>
 					</td>
 					<td class="text-center"></td>
  				</tr>
 				<?php endwhile;?>
 			</tbody>
 			
 			
 		</table>
 	
 	</div>
 	