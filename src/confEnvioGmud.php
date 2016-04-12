<?php 
require_once 'conexao.php';

$result = mysqli_query($link, "select * from email") or die("Erro na consulta ".mysqli_error($link));
$email = mysqli_fetch_assoc($result);

?>

<div class="container text-center">

	<h3>Configuração de conta de envio</h3>
	<form action="confEnvioGmudLogic.php"method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<input class="for-coutrol" type="email" size="40"name="email" value="<?=$email['usuario']?>" required>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input class="for-coutrol" type="password" size="40"name="senha" value="<?= $email['senha']?>" required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" >Atualizar</button>
		</div>
		
	</form>


</div>