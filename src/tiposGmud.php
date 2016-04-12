<?php
include 'conexao.php';

$query = "select * from tipomudanca";
$result = mysqli_query($link, $query);

while ($tipo = mysqli_fetch_assoc($result)){
	echo $tipo['id']." -- ".$tipo['tipoMudanca']."<br/>";
}