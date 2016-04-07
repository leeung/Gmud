<?php
require_once 'conexao.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])) $id = $_GET['id']; ELSE $id = NULL;

if ($id == NULL) {
	echo "<script>alert('Gmud não localizada');</script>";
	echo"<script>window.location.href='index.php'</script>";
}

	$dataFechamento = date("Y-m-d h:m:s");
	$queryFechar = "update gmud set situacao = 3, dataFechamento = '{$dataFechamento}' where id={$id}";
	mysqli_query($link, $queryFechar) or die("erro no select<br/>".mysqli_error($link));
	
	if (mysqli_affected_rows($link) == 1){
		echo "<script>alert('Gmud encerrada')</script>";
	}else{
		echo "<script>alert('Não foi possível fechar a gmud')</script>";
	}
	
	echo "<script>window.location.href='index.php'</script>";