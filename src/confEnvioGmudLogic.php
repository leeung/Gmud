<?php

if(!isset($_POST['email']) && !isset($_POST['senha']))die("Falta dados");

require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "update email set usuario='{$email}', senha='{$senha}'";
mysqli_query($link, $query) or die("erro na atualização dos dados ".mysqli_error($link));

if(mysqli_affected_rows($link) > 0) echo "<script>alert('Dados atualizados com sucesso')</script>";


echo "<script>window.location.href='index.php'</script>";