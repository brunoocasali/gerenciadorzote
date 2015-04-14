<?php
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	include_once './conectar.php';
	
	$sql = ($conecta && $banco) ? 
			"SELECT * FROM users WHERE (((login = '".$email."') OR (email = '".$email."')) AND (Senha = md5('".$senha."')));" : "";
	$resultado = mysql_query($sql) or die("<br />ERRO AO EXECUTAR");
		
	if($resultado){
		session_start();
		while ($linha = mysql_fetch_array($resultado)) {
			$_SESSION['Nome'] = $linha["name"];
			$_SESSION['Login'] = $linha["login"];
			$_SESSION['Email'] = $linha["mail"];
			$_SESSION['ID'] = $linha["id"];
			$_SESSION['time'] = time();
			echo $_SESSION['time'];
			echo $_SESSION['Nome'];
			$_SESSION['controle'] = "login_ok";
		}
		header ("location: ../gerenciador.php");
	} else {
		session_destroy();
		$_SESSION['controle'] = "login_erro";
		header ("location: ../login.php");
	}
?>
