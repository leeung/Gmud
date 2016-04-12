<?php if(isset($_GET['id']) && is_numeric($_GET['id'])) $id = $_GET['id']; else $id = NULL;
if($id == NULL) echo "<script>window.close();</script>";
require_once 'conexao.php';

$sql = "SELECT inicioExecucao,resultato,problemas,respValMudanca FROM gmud WHERE id={$id}";
$result = mysqli_query($link, $sql);
$gmud = mysqli_fetch_assoc($result);

if(mysqli_error($link))die("Não foi possível encontrar os dados da Gmud");

date_default_timezone_set("America/Sao_paulo");
$gmud['inicioExecucao'] = date_format(new DateTime($gmud['inicioExecucao']), "d/m/Y h:i:s");
$gmud['terminoExecucao'] = date_format(new DateTime(), "d/m/Y h:i:s");
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title>Fechamento Gmud</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript">

			
		
		</script>
	</head>
	<body>
		<div class="container">

			<form class="form"action="fecharGmudLogic.php" method="post">
				<input type="hidden" name="id" value="<?=$id ?>">
				<div class="form-group">
					<label for="inicioExec">Início real: </label>
					<input class="form-control"name="inicioExec" type="datetime"inicioExec" value="<?=$gmud['inicioExecucao'] ?>" required>
				</div>
				<div class="form-group">
					<label for="terminoExec">Término real: </label>
					<input class="form-control" type="datetime" name="terminoExec" value="<?=$gmud['terminoExecucao']; ?>"required>
				</div>
				<div class="form-group">
					<label for="resultado">Resultado: </label>
					<input class="form-control"type="text" name="resultado" required>
				</div>
				<div class="form-group">
					<label for="respValidacao">Validação: </label>
					<input class="form-control"type="text" name="respValidacao" value="<?=$gmud['respValMudanca']; ?>" required>
				</div>
				<div class="form-group">
					<label for="problemas">Problemas: </label>
					<textarea class="form-control" name="problemas" rows="3" required></textarea>
				</div>
				<div class="form-group">
					<button class="form-control btn btn-primary" type="submit" >Fechar</button>
				</div>
				
								
			</form>
			
		</div>

		
	</body>
</html>

