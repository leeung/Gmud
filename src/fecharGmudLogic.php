<?php

require_once 'conexao.php';
if(isset($_POST['id']) && is_numeric($_POST['id'])) $id = $_POST['id']; ELSE $id = NULL;

if ($id == NULL) {
	echo "<script>alert('Gmud não localizada');</script>";
	echo"<script>window.location.href='index.php'</script>";
}
	date_default_timezone_set("America/Sao_paulo");
	$inicioReal = date_format(new DateTime(str_replace("/", "-", $_POST['inicioExec'])), "Y-m-d h:i:s");
	$terminoReal = date_format(new DateTime(str_replace("/", "-", $_POST['terminoExec'])), "Y-m-d h:i:s");
	$resultato = $_POST['resultado'];
	$respValidação = $_POST['respValidacao'];
	$problemas = $_POST['problemas'];
	$situacao = 3; //3 = encerrada
	
	$queryFechar = "update gmud set 
					inicioExecucao = '{$inicioReal}', 
					dataFechamento = '{$terminoReal}',
					resultato = '{$resultato}', 
					respValMudanca = '{$respValidação}',
					problemas = '{$problemas}',
					situacao = '{$situacao}'
					where id={$id}";
	
	mysqli_query($link, $queryFechar) or die("erro no select<br/>".$queryFechar."<br/>".mysqli_error($link));
	
	if (mysqli_affected_rows($link) == 1){
		//echo $queryFechar;
		echo "<script>alert('Gmud encerrada');window.close();</script>";
		echo "<script>window.location.href='enviarGemudLogic.php?id={$id}'</script>";
	}else{
		echo "<script>alert('Não foi possível fechar a gmud'); window.close();</script>";
	}
	