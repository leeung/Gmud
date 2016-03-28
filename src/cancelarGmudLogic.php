<?php
require_once 'conexao.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])) $id = $_GET['id']; ELSE $id = NULL;

if ($id == NULL) {
	echo "<script>alert('Gmud não localizada');</script>";
	echo"<script>window.location.href='index.php'</script>";
}

	$queryCancelar = "update gmud set situacao = (select id from situacaogmud where descricao='Cancelado') where id={$id}";
	mysqli_query($link, $queryCancelar) or die("erro no select<br/>".mysqli_error($link));
	
	if (mysqli_affected_rows($link) == 1){
		echo "<script>alert('Gmud cancelada')</script>";
	}else{
		echo "<script>alert('Não foi possível cancelar a gmud')</script>";
	}
	
	echo "<script>window.location.href='index.php'</script>";