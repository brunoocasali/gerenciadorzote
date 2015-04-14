<?php 
	session_start();
	$nome = $_POST["nome"];
	$user = $_POST["i"];
	include_once './conectar.php';

	$query = $conecta && $banco ? "INSERT INTO lists (name, user_id) VALUES ('$nome', '$user')" : "";
	$insere = mysql_query($query) or die("ERROO meu caro!");

  	$query = $conecta && $banco ? "SELECT * FROM lists WHERE (user_id = ".$_SESSION["ID"].")" : "";
        $resultado = mysql_query($query) or die("<li class='list-group-item alert alert-danger'>Erroo ao executar :(</li>");

	if($resultado){
		while ($linha = mysql_fetch_array($resultado)) {
			$id = $linha["IDLista"];
		}
	}
	if ($insere) {
		$_SESSION['controle'] = "incluir_ok";
		header ("location: ../gerenciador.php?i=".$id);
	} else {
		$_SESSION['controle'] = "incluir_erro";
		header ("location: ../gerenciador.php?i=".$id);
	}
 ?>
