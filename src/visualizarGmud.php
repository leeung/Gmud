<?php 
	require_once 'conexao.php';
	isset($_GET['id']) && is_numeric($_GET['id'])? $gmud = $_GET['id'] : $gmud = null;
	
	if($gmud == null) die("Selecione uma Gmud");
	
	$query = "select * from gmud where id = {$gmud}";
	
	$result = mysqli_query($link, $query);
	if(mysqli_affected_rows($link) != 1) die("a consulta não retornou nados");
	
	$gmud = mysqli_fetch_assoc($result);

	$gmud['situacao'] = mysqli_fetch_assoc(mysqli_query($link, "select descricao from situacaogmud where id={$gmud['situacao']}"))['descricao'];
	$gmud['tipoMudanca'] = mysqli_fetch_assoc(mysqli_query($link, "select tipoMudanca from tipomudanca where id={$gmud['tipoMudanca']}"))['tipoMudanca'];
	$gmud['riscoExecucao'] = mysqli_fetch_assoc(mysqli_query($link, "select descricao from risco where id={$gmud['riscoExecucao']}"))['descricao'];
	$gmud['riscoNaoExecucao'] = mysqli_fetch_assoc(mysqli_query($link, "select descricao from risco where id={$gmud['riscoNaoExecucao']}"))['descricao'];
	$gmud['homologado'] == 1? $gmud['homologado'] = "SIM" : $gmud['homologado'] = "NÃO"; 

	?>
  
	<div class="container bg-warning">
		<div class="row topo">
			<div class="col-sm-2 col-xs-12 "><img class="logo" alt="logo" src="imagens/logocf.png"></div>
			<div class="col-sm-8 col-xs-12 text-center">
				<div class="row"><div class="col-xs-12"><h3>GMUD - GESTAO DE MUDANÇA - <?=$gmud['id'] ?></h3></div></div>
				<div class="row text-info"><div class="col-xs-12"><h5><?=$gmud['situacao']?></h5></div></div>
			</div>
		</div>

		<div class="row cabecalho">
			<div class="col-sm-6 col-xs-12 ">
				<div class="row">
					<div class="col-xs-12"><strong>Tipo mudanca</strong><br/><p><?=$gmud['tipoMudanca']?></p></div>
					<div class="col-xs-12"><strong>Sistema</strong><br/><p><?=$gmud['sistema']?></p></div>
					<div class="col-xs-12"><strong>Módulos</strong><br/><p><?=$gmud['modulos']?></p></div>
					<div class="col-xs-12"><strong>Contigência</strong><br/><p><?=$gmud['contigencia']?></p></div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-xs-6"><strong>Requisitante</strong><br/><p><?=$gmud['requisitante']?></p></div>
					<div class="col-xs-6"><strong>Chamado</strong><br/><p><?=$gmud['chamado']?></p></div>
					<div class="col-xs-6"><strong>Data Hora</strong><br/><p><?=$gmud['dataHoraExec']?></p></div>
					<div class="col-xs-6"><strong>Homologado</strong><br/><p><?=$gmud['homologado']?></p></div>
					<div class="col-xs-6"><strong>Risco da Execução</strong><br/><p><?=$gmud['riscoExecucao']?></p></div>
					<div class="col-xs-6"><strong>Risco da Nao Execução</strong><br/><p><?=$gmud['riscoNaoExecucao']?></p></div>
					<div class="col-xs-6"><strong>Responsável pela mudança</strong><br/><p><?=$gmud['respMudanca']?></p></div>
					<div class="col-xs-6"><strong>Responável pela avaliação da Mudança</strong><br/><p><?=$gmud['respValMudanca']?></p></div>
				</div>
			</div>
		</div>
		
		<div class="row argigo">
			<div class="col-xs-6"><strong>Descrição da Mudança</strong><br/><p><?=$gmud['descricao']?></p></div>
			<div class="col-xs-6"><strong>Objetivo</strong><br/><p><?=$gmud['objetivo']?></p></div>	
		</div>
		
		<div class="row argigo">
			<div class="col-xs-6"><strong>Risco da mudança</strong><br/><p><?=$gmud['riscoDesc']?></p></div>
			<div class="col-xs-6"><strong>Risco da não mudança</strong><br/><p><?=$gmud['riscoDescNaoExec']?></p></div>	
		</div>
		
		<div class="row argigo">
			<div class="col-xs-6"><strong>Disponibilidade</strong><br/><p><?=$gmud['indisponibilidade']?></p></div>
			<div class="col-xs-6"><strong>Observações Gerais</strong><br/><p><?=$gmud['observacao']?></p></div>	
		</div>

	</div>
	

	