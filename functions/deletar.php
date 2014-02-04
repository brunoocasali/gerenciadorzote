<?php 
	session_start();
	$id = $_GET["i"];
	include_once './conectar.php';

	$query = $conecta && $banco ? "DELETE FROM listas WHERE (IDLista = '$id')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

	if ($insere) {
		$_SESSION['Controle'] = "del_ok";
		header ("location: ../gerenciador.php?i");
	} else {
		$_SESSION['Controle'] = "del_erro";
		header ("location: ../gerenciador.php?i");
	}
 ?>