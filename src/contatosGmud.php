<?php 

require_once 'conexao.php';
$query ="select * from contatos";
$result = mysqli_query($link, $query) or die("Erro no sql: ".mysqli_error($link));

$contatos = null;

	if(mysqli_affected_rows($link) == 1){
		$contatos = mysqli_fetch_assoc($result);
	}else{
		$contatos['endereco'] = "Nenhum endereço encontrado";
		$contatos['id'] = null;
	}
?>

<div class="container">
	<div class="row">
		<h1 class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">Contatos</h1>
		<h6 class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">fulano@???.com.br ; sicrano@???.com<br/>separando sempre pelo caractere ;</h6>
		
	</div>
	<form class="form" action="contatosGmudlogic.php" method="post">
		<div class="form-group">
			<input type="hidden" name="id" value="<?=$contatos['id']?>">
			<textarea name="contatos"class="area form-control " rows="5"><?=$contatos['endereco']?></textarea>
		</div>
		<div class="form-group">
			<input class="btn btn-primary form-control" type="submit" value="Atualizar Lista">
		</div>

	</form>

</div>