<?php

$link = mysqli_connect("localhost","root", "", "ti") 
	or die("erro na conexao com o banco: ".mysqli_error($link));

	//var_dump(mysqli_get_charset($link));
