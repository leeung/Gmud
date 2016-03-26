<?php 
	require_once 'conexao.php';
	$listaTipoMudanca = "select * from tipoMudanca";
	$listaRisco = "select * from Risco";
	
	$resultRisco = mysqli_query($link, $listaRisco) or die ("erro na query ListaRisco");
	$resultTipoMudanca = mysqli_query($link, $listaTipoMudanca) or die ("erro na query listaTipoMudanca");
	$risco = null;
	while ($r = mysqli_fetch_array($resultRisco)){
		$risco[] = array('id'=>$r[0], 'descricao'=>$r[1]);
	}

?>
<!DOCTYPE html>
<html lang="PT-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nova Gmud</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
  
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12 text-center">
    			<h1>GMUD - GESTÃO DE MUDANÇA - 0009</h1>
    		</div>
    	</div>
    	
    	<form class="form" action="SalvarMudanca.php" method="POST">
    		<div class="form-group">	
    			<label>TIPO DE MUDANÇA</label><br/>
    			<div class="radio">
    			<?php while ($tipoMudanca = mysqli_fetch_array($resultTipoMudanca)):?>
    				<label>
    					<input type="radio" name="tipoMudanca" value="<?=$tipoMudanca['0']?>" required>
    					<?=$tipoMudanca[1]?>
    				</label>
    			<?php endwhile;?>
    			</div>   			
    		</div>
    		
    		<div class="form-group">
    			<label for="sistema">SISTEMA*</label>
    			<input class="form-control" type="text" name="sistema" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="modulos">MODULOS*</label>
    			<input class="form-control" type="text" name="modulos" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="descricao">DESCRIÇÃO DA MUDANÇA*</label>
    			<textarea class="form-control" name="descricao" rows="3" required></textarea>
    		</div>
    		<div class="form-group">
    			<label for="objetivo">OBJETIVO*</label>
    			<textarea class="form-control" name="objetivo" rows="3"required></textarea>
    		</div>
    		
    		<div class="form-group">
    			<label for="requisitante">REQUISITANTE*</label>
    			<input class="form-control" type="text" name="requisitante" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="chamado">CHAMADO TI CF-TOTVS</label>
    			<input class="form-control" type="text" name="chamado">
    		</div>
    		
    		<div class="form-group">
    			<label for="dataHoraExecucao">DATA E HORA PRETENDIDA PARA EXECUÇÃO*</label>
    			<input type="datetime-local" name="dataHoraExecucao" required> 
    		</div>
    		<div class="form-group">
    			<label for="homologado">HOMOLOGADO</label>
    			<div class="radio">
    				<label>
    					<input type="radio" id="homologado" name="homologado" value="true" checked>
    					SIM
    				</label>
    				<label>
    					<input type="radio" id="homologado" name="homologado" value="false">
    					NÃO
    				</label>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<label for="riscoExecucao">RISCO DA EXECUÇÃO DA MUDANÇA*</label>
    			<select name="riscoExecucao" class="form-control">
    			<?php foreach ($risco as $r):?>
    				<option value="<?=$r['id']?>" ><?=$r['descricao']?></option>
				<?php endforeach;?>
    			</select>
    			
    			<label for="descRiscoExecucao">DESCRIÇÃO DO RISCO*</label>
    			<textarea class="form-control" name="descRiscoExecucao" rows="3"required></textarea>
    		</div>
    		
    		<div class="form-group">
    			<label for="riscoNaoExecucao">RISCO DA NÃO EXECUÇÃO DA MUDANÇA*</label>
    			<select name="riscoNaoExecucao" class="form-control">
				<?php foreach ($risco as $r):?>
    				<option value="<?=$r['id']?>" ><?=$r['descricao']?></option>
				<?php endforeach;?>
    			</select>
    			
    			<label for="descRiscoNaoEcexucao">DESCRIÇÃO RISCO NÃO EXECUÇÃO*</label>
    			<textarea class="form-control" name="descRiscoNaoEcexucao" rows="3"required></textarea>
    		</div>
    		
    		
    		<div class="form-group">
    			<label for="indisponibilidade">INDISPONIBILIDADE*</label>
    			<textarea class="form-control" name="indisponibilidade" rows="3"required></textarea>
    		</div>
    		
    		<div class="form-group">
    			<label for="contigencia">CONTIGENCIA*</label>
    			<input class="form-control" type="text" name="contigencia" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="respMudanca">RESPONSÁVEL PELA MUDANÇA*</label>
    			<input class="form-control" type="text" name="respMudanca" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="respValMudanca">DESPONSÁVEL PELA VALIDAÇÃO DA MUDANÇA*</label>
    			<input class="form-control" type="text" name="respValMudanca" required>
    		</div>
    		
    		<div class="form-group">
    			<label for="observacao">OBSERVAÇÕES GERAIS*</label>
    			<textarea class="form-control" name="observacao" rows="3"required></textarea>
    		</div>
    		
    		<div class="form-group">
    			<button class="form-control btn btn-primary">SALVAR MUDANÇA</button>
    		</div>
    		
    		
    	</form>
    </div>

  
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>