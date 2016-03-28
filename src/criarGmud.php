<?php 

	$listaTipoMudanca = "select * from tipoMudanca";
	$listaRisco = "select * from Risco";
	
	$resultRisco = mysqli_query($link, $listaRisco) or die ("erro na query ListaRisco");
	$resultTipoMudanca = mysqli_query($link, $listaTipoMudanca) or die ("erro na query listaTipoMudanca");
	$risco = null;
	while ($r = mysqli_fetch_array($resultRisco)){
		$risco[] = array('id'=>$r[0], 'descricao'=>$r[1]);
	}

?>

  
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12 text-center">
    			<h1>GMUD - GESTÃO DE MUDANÇA</h1>
    		</div>
    	</div>
    	
    	<form class="form" action="criarGmudLogic.php" method="POST">
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

  
