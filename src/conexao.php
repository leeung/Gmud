<?php

$resource = mysql_connect("localhost", "root", "");
$link = mysql_select_db("ti",$resource);
if(!$link){
	echo "não foi possivel conectar ao banco";
}