<?php

function enviarEmail($from, $fromName, $title, $address, $cc, $corpo){
	require_once("class.phpmailer.php");
	require_once("class.smtp.php");
	
	$Email = new PHPMailer();
	$Email->SetLanguage("br");
	$Email->CharSet = "utf-8";
	$Email->IsMail();
	$Email->IsHTML(true);
	$Email->IsSMTP();
	$Email->SMTPAuth = true;
	$Email->SMTPSecure = "ssl";
	$Email->WordWrap = 50;
	
	$Email->Host = "smtp.gmail.com";
	$Email->Port = 465;//465
	
	//Gmail server
	$Email->Username = "leeung@casafreitas.com.br"; // Gmail login
	$Email->Password = "L@am0401"; // Gmail senha
	
	$Email->From = $from;
	$Email->FromName = $fromName;
	$Email->Subject = $title;
	
	foreach ($address as $end){
		if (strlen($end)>1)
			$Email->AddAddress($end);
	}
	
	if ($cc != null){
		foreach ($cc as $c){
			$Email->addBCC($c['email'], $c['nome']);
		}
	}
	
	//$body = $Email->filenameToType("visualizarGmud.php?id=17");
	//$Email->AltBody = "para mensagens somente texto";
	
	$Email->MsgHTML($corpo);
	
	if(!$Email->Send()) {
		return false;
		//echo "Mensagem de erro: " . $Email->ErrorInfo;
	}
	
	return true;	
}