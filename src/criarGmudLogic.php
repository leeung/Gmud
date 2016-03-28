<?php
require_once 'conexao.php';

date_default_timezone_set("America/Sao_paulo");

$dataCriacao			= date('Y-m-d');
$situacaoGmud			= 1;
$tipoMudanca 			= $_POST['tipoMudanca'];
$sistema				= $_POST['sistema'];
$modulos				= $_POST['modulos'];
$descMudanca			= $_POST['descricao'];
$objetivos				= $_POST['objetivo'];
$requisitante			= $_POST['requisitante'];
$chamado				= $_POST['chamado'];
$dataHora				= $_POST['dataHoraExecucao'];
$homologado				= $_POST['homologado'];
$riscoMudanca			= $_POST['riscoExecucao'];
$descRiscoMudanca		= $_POST['descRiscoExecucao'];
$riscoNaoMudanca		= $_POST['riscoNaoExecucao'];
$descRiscoNaoMudanca	= $_POST['descRiscoNaoEcexucao'];
$indisponibilidade		= $_POST['indisponibilidade'];
$contigencia			= $_POST['contigencia'];
$respMudanca			= $_POST['respMudanca'];
$respValidacaoMudanca	= $_POST['respValMudanca'];
$observacoes			= $_POST['observacao'];


$query = 	"INSERT INTO `ti`.`gmud` (`id`, `tipoMudanca`, `sistema`, `modulos`, `descricao`, `objetivo`, `requisitante`, `chamado`, `dataHoraExec`, `homologado`, `riscoDesc`, `riscoDescNaoExec`, `indisponibilidade`, `contigencia`, `respMudanca`, `respValMudanca`, `observacao`, `riscoExecucao`, `riscoNaoExecucao`,`dataCriacao`, `situacao`) 
			VALUES (NULL, '{$tipoMudanca}', '{$sistema}', '{$modulos}', '{$descMudanca}', '{$objetivos}', '{$requisitante}', '{$chamado}', '{$dataHora}', '{$homologado}', '{$descRiscoMudanca}', '{$descRiscoNaoMudanca}', '{$indisponibilidade}', '{$contigencia}','{$respMudanca}', '{$respValidacaoMudanca}', '{$observacoes}', '{$riscoMudanca}', '{$riscoNaoMudanca}', '{$dataCriacao}', '{$situacaoGmud}');";

$result = mysqli_query($link, $query)or die (mysqli_error($link));

if(mysqli_affected_rows($link) > 0 )  echo "<script>alert('Gmud inserida com sucesso');</script>";
ELSE ECHO "<script>alert('Não foi possível excluir a GMUD');</script>";

echo"<script>window.location.href='index.php'</script>";
