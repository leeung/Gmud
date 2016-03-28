<?php

require_once 'conexao.php';
require_once 'functions.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) $id = $_GET['id']; ELSE $id = NULL;
if ($id == NULL) die("Valor do Id inválido");

$selectExcluirGmud = "delete from gmud where id={$id}";

 mysqli_query($link, $selectExcluirGmud);
 
 if(mysqli_affected_rows($link) > 0) echo "<script>alert('Gmud {$id} Excluída com sucesso');</script>"; 
 ELSE ECHO "<script>alert('Não foi possível excluir a GMUD {$id}');</script>";
 
echo"<script>window.location.href='index.php'</script>";
 