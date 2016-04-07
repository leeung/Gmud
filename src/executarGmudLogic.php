<?php

require_once 'conexao.php';

if(isset($_GET['id'])&& is_numeric($_GET['id'])) $id = $_GET['id']; else $id= NULL;
if($id == NULL) die ("Selecione uma Gmud válida");

date_default_timezone_set("America/Sao_Paulo");

$execucao = date_format(new DateTime(), "Y-m-d h:m:s");

$sql_executar = "update gmud set situacao = 4 , inicioExecucao ='{$execucao}' where id={$id}";

mysqli_query($link, $sql_executar);
if(mysqli_affected_rows($link) != 1){
	echo "<script>alert('Houve um erro na execucao da Gmud');</script>";
	echo $sql_executar;
	die();
}

echo "<script>window.location.href='index.php'</script>";
	