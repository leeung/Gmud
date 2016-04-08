<?php

require_once 'conexao.php';
if(isset($_POST['id']) && is_numeric($_POST['id'])) $id = $_POST['id']; ELSE $id = NULL;

if ($id == NULL) {
	echo "<script>alert('Gmud não localizada');</script>";
	echo"<script>window.location.href='index.php'</script>";
}
	date_default_timezone_set("America/Sao_paulo");
	$inicioReal = date_format(new DateTime(str_replace("/", "-", $_POST['inicioExec'])), "Y-m-d h:m:s");
	$terminoReal = date_format(new DateTime(str_replace("/", "-", $_POST['terminoExec'])), "Y-m-d h:m:s");
	$resultato = $_POST['resultado'];
	$respValidação = $_POST['respValidacao'];
	$problemas = $_POST['problemas'];
	
	$queryFechar = "update gmud set 
					inicioExecucao = '{$inicioReal}', 
					dataFechamento = '{$terminoReal}',
					resultato = '{$resultato}', 
					respValMudanca = '{$respValidação}',
					problemas = '{$problemas}' 
					where id={$id}";
	
	mysqli_query($link, $queryFechar) or die("erro no select<br/>".$queryFechar."<br/>".mysqli_error($link));
	
	if (mysqli_affected_rows($link) == 1){
		echo "<script>alert('Gmud encerrada')</script>";
	}else{
		echo "<script>alert('Não foi possível fechar a gmud')</script>";
	}
	
	echo "<script>window.location.href='index.php'</script>";