<?php 
	session_start();
	$id = $_GET["i"];
	$lista = $_GET["u"];

	include_once './conectar.php';

	$query = $conecta && $banco ? "UPDATE tasks SET done = true WHERE (id = '".$id."')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

	if ($insere) {
		header ("location: ../gerenciador.php?i=".$lista);
	} else {
		header ("location: ../gerenciador.php?i=".$lista);
	}
 ?>
