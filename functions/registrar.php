<?php 
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$login = $_POST["login"];
	$nome = $_POST["nome"];

	include_once './conectar.php';

	$query = $conecta && $banco ? "INSERT INTO usuarios (Nome, Senha, Email, Login) VALUES ('$nome', md5('$senha'), '$email', '$login')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

		session_start();
	if ($insere) {
		$_SESSION['Controle'] = "novo_user";
		header ("location: ../login.php");
	} else {
		$_SESSION['Controle'] = "erro_cadastro";
		header ("location: ../registro.php");
	}
 ?>