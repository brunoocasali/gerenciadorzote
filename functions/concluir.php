<?php 
	session_start();
	$id = $_GET["i"];
	$lista = $_GET["u"];

	include_once './conectar.php';

	$query = $conecta && $banco ? "UPDATE tarefas SET Concluida = '1' WHERE (IDTask = '".$id."')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

	if ($insere) {
		//$_SESSION['Controle'] = "conclu_ok";
		header ("location: ../gerenciador.php?i=".$lista);
	} else {
		//$_SESSION['Controle'] = "conclu_err";
		header ("location: ../gerenciador.php?i=".$lista);
	}
 ?>