<?php
$id =NULL;
if(isset($_GET['id']) && is_numeric($_POST['id'])) $id = $_POST['id'];
if($id == NULL) die("falta parametros para a funcao");

require_once 'functions.php';
require_once 'conexao.php';

$address = mysqli_fetch_row(mysqli_query($link, "select endereco contatos"));
$address = mysqli_fetch_row(mysqli_query($link, "select endereco contatos"));
$Gmud = mysqli_fetch_row(mysqli_query($link, "select * from gmud join tipomudanca on "));

enviarEmail("leeung@casafreitas.com.br", "Suporte TI", "", $address, NULL, getCorpoEnvioGmudNovo($id));


function getCorpoEnvioGmudNovo($id){
$corpo =
'
		<div class="containerGmud">
			<h1>(GMUD) GESTÃO DE MUDANÇA - 0011</h1>
		
			<p>
				<b>TIPO DE MUDANÇA:</b> EMERGENCIAL NÃO PROGRAMADA (  )  NORMAL PROGRAMADA ( X )<br/>
				<b>SISTEMA:</b> SITEF<br/>
				<b>MÓDULOS:</b> Todos os módulos<br/>
				<b>DESCRIÇÃO DA MUDANÇA:</b> Migração do serviço SITEF (intermediador de transações de cartões de crédito). O serviço SITEF será migrado de servidor para que o serviço fique isolado dos outros serviços, hoje o sistema compartilha o servidor de banco de dados do sistema Protheus.<br/>
			</p>
			
			<p> 
				<b>OBJETIVO:</b> Instalar o serviço do SITEF em um servidor próprio, ou seja, colocar o sistema em um servidor separado dos demais para facilitar a manutenção e evitar problemas no servidor de banco de dados do sistema Protheus.<br/>
 			</p>
 			<p>
 				<b>REQUISITANTE:</b> Tecnologia (Damasceno)<br/>
				<b>CHAMADO TI CF/TOTVS:</b> Sem chamado.<br/>
				<b>DATA PRETENDIDA P/EXECUÇÃO:</b> 29/03/2016 as 18:00<br/>
				<b>TEMPO ESTIMADO:</b> 03:00<br/>
				<b>HOMOLOGADO:</b> ( X ) Sim ( ) Não<br/>
				<b>RISCO DA EXECUÇÃO DA MUDANÇA:</b> MÉDIO<br/>
				<b>DESCRIÇÃO DO RISCO:</b> Existe a possibilidade de o sistema ou alguma funcionalidade ficar indisponível, caso ocorra problemas não identificados na homologação.<br/>
				<b>RISCO DA NÃO EXECUÇÃO DA MUDANÇA:</b> MÉDIO<br/>
				<b>DESCRIÇÃO DO RISCO:</b> Continuar com o serviço do SITEF compartilhando o servidor com o BD Protheus, podendo causar problemas no BD Protheus caso se necessite realizar manutenções no servidor do SITEF ou o contrário.<br/>
				<b>INDISPONIBILIDADE:</b> DURANTE A EXECUÇÃO DA ATIVIDADE O SISTEMA SITEF FICARÁ INDISPONÍVEL, AS VENDAS A CARTÃO DEVERÃO SER FEITAS VIA POS.<br/>
				<b>CONTINGÊNCIA:</b> NÃO SE APLICA<br/>
				<b>RESPONSÁVEL PELA MUDANÇA:</b> Damasceno.<br/>
				<b>RESPONSÁVEL PELA EXECUÇÃO DA MUDANÇA:</b> Damasceno, Valter Carvalho, Leeung, Diego e David.<br/>
				<b>RESPONSÁVEL PELA VALIDAÇÃO DA MUDANÇA:</b> Damasceno, Valter Carvalho, Leeung, Diego e David.<br/>
				<b>OBSERVAÇÕES GERAIS:</b> Durante a execução da atividade os caixas deverão estar ligados, pois precisaram ser configurados individualmente.
			</p>
		</div>


';

return $corpo;
}

