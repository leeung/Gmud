<?php

require_once 'conexao.php';

if(!isset($_POST['contatos']) && !isset($_POST['id'])){
	die("não existe dados");
}

$contatos = $_POST['contatos'];
$id = $_POST['id'];
$cont = null;
foreach (explode(";",$contatos) as $contato){

	$endereco = strtolower(str_replace(" ",  "",trim($contato)));
	
	if (!strpbrk($endereco, "@") || !strpbrk($endereco, ".") ){
		die("O email não confere: ".$endereco);
	}
	
	$cont = $contato.";".$cont;
}
$contatos = $cont;
$query = "update contatos set endereco = '{$contatos}' where id={$id}";
mysqli_query($link,$query) or die("Erro na atualização do contato");
if(mysqli_affected_rows($link) > 0) echo "<script>alert('Contatos atualizados');</script>"; 
 ELSE ECHO "<script>alert('Nenhum dado foi atualizado');</script>";
 
echo"<script>window.location.href='index.php'</script>";
// echo $query;