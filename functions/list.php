<?php 
	session_start();
	$nome = $_POST["nome"];
	$user = $_POST["i"];
	include_once './conectar.php';

	$query = $conecta && $banco ? "INSERT INTO listas (Nome, IDUser) VALUES ('$nome', '$user')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

  	$query = $conecta && $banco ? "SELECT * FROM listas WHERE (IDUser = ".$_SESSION["ID"].")" : "";
    $resultado = mysql_query($query) or die("<li class='list-group-item alert alert-danger'>Erroo ao executar :(</li>");

	if($resultado){
		while ($linha = mysql_fetch_array($resultado)) {
			$id = $linha["IDLista"];
		}
	}
	if ($insere) {
		$_SESSION['Controle'] = "incluir_ok";
		header ("location: ../gerenciador.php?i=".$id);
	} else {
		$_SESSION['Controle'] = "incluir_erro";
		header ("location: ../gerenciador.php?i=".$id);
	}
 ?>