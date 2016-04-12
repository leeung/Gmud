<?php
$id =NULL;
if(isset($_GET['id']) && is_numeric($_GET['id'])) $id = $_GET['id'];
if($id == NULL) die("falta parametros para a funcao");

require_once 'functions.php';
require_once 'conexao.php';

$address = mysqli_fetch_row(mysqli_query($link, "select endereco from contatos"));
$address = explode(";", $address[0]);

$Gmud = mysqli_fetch_assoc(mysqli_query($link, 	"select g.id, t.tipoMudanca, g.sistema, g.modulos, g.descricao, g.objetivo, g.requisitante, g.chamado, g.dataHoraExecPret, g.homologado, re.descricao as riscoExec, 
		g.riscoDesc, rn.descricao as riscoNaoExec, g.riscoDescNaoExec, g.indisponibilidade, g.contigencia, g.respMudanca, g.respValMudanca, g.observacao
from gmud g 
join tipomudanca t on g.tipoMudanca = t.id
join situacaogmud s on g.situacao = s.id
join risco re on g.riscoExecucao = re.id
join risco rn on g.riscoNaoExecucao = rn.id
where g.id={$id}"));
if(mysqli_error($link))die(mysqli_error($link));
var_dump($Gmud);

$result = enviarEmail("leeung@casafreitas.com.br", "Suporte TI", "(GMUD) GESTÃO DE MUDANÇA - ".$Gmud['id'], $address, NULL, getCorpoEnvioGmudNovo($Gmud));
	

if ($result) echo "<script>alert('Gmud Enviada')</script>";
	else die();//echo "<script>alert('Erro no envio da Gmud')</script>";
	
echo"<script>window.location.href='index.php'</script>";

function getCorpoEnvioGmudNovo($gmud){
	if ($gmud['homologado']) $gmud['homologado'] = "(X)Sim ( )Nao"; else $gmud['homologado'] = "( )Sim (X)Nao";
	
	
$corpo =
"
		<div class='containerGmud'>
			<h1>(GMUD) GESTÃO DE MUDANÇA - {$gmud['id']}</h1>
		
			<p>
				<b>TIPO DE MUDANÇA:</b> {$gmud['tipoMudanca']} ( X )<br/>
				<b>SISTEMA:</b> {$gmud['sistema']}<br/>
				<b>MÓDULOS:</b> {$gmud['modulos']}<br/>
				<b>DESCRIÇÃO DA MUDANÇA:</b> {$gmud['descricao']}<br/>
			</p>
			
			<p> 
				<b>OBJETIVO:</b> {$gmud['objetivo']}<br/>
 			</p>
 			<p>
 				<b>REQUISITANTE:</b> {$gmud['requisitante']}<br/>
				<b>CHAMADO TI CF/TOTVS:</b> {$gmud['chamado']}<br/>
				<b>DATA PRETENDIDA P/EXECUÇÃO:</b> {$gmud['dataHoraExecPret']}<br/>
				<b>TEMPO ESTIMADO:</b> --<br/>
				<b>HOMOLOGADO:</b>{$gmud['homologado']}<br/>
				<b>RISCO DA EXECUÇÃO DA MUDANÇA:</b> {$gmud['riscoExec']}<br/>
				<b>DESCRIÇÃO DO RISCO:</b> {$gmud['riscoDesc']}<br/>
				<b>RISCO DA NÃO EXECUÇÃO DA MUDANÇA:</b> {$gmud['riscoNaoExec']}<br/>
				<b>DESCRIÇÃO DO RISCO:</b> {$gmud['riscoDescNaoExec']}<br/>
				<b>INDISPONIBILIDADE:</b>{$gmud['indisponibilidade']}<br/>
				<b>CONTINGÊNCIA:</b> {$gmud['contigencia']}<br/>
				<b>RESPONSÁVEL PELA MUDANÇA:</b> {$gmud['respMudanca']}<br/>
				<b>RESPONSÁVEL PELA EXECUÇÃO DA MUDANÇA:</b> --<br/>
				<b>RESPONSÁVEL PELA VALIDAÇÃO DA MUDANÇA:</b> {$gmud['respValMudanca']}<br/>
				<b>OBSERVAÇÕES GERAIS:</b> {$gmud['observacao']}
			</p>
		</div>
";

return $corpo;
}

