<?php

function redirecionar($pagina, $msg){
	ECHO "<script>alert('teste');</script>";
	header("Location: ".$pagina.".php");
	
}