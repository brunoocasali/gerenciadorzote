<?php 
	$data = $_POST["data"];
	$nome = $_POST["nome"];
	$list = $_POST["i"];

	$data = date('Y-m-d H:i');

	include_once './conectar.php';

	$query = $conecta && $banco ? "INSERT INTO tarefas (Nome, Data, IDList) VALUES ('$nome', '$data', '$list')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

	if ($insere) {
		session_start();
		$_SESSION['Controle'] = "incluir_ok";
		header ("location: ../gerenciador.php?i=".$list);
	} else {
		session_start();
		$_SESSION['Controle'] = "incluir_erro";
		header ("location: ../gerenciador.php?i=".$list);
	}
 ?>