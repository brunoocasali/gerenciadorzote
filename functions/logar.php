<?php
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	include_once './conectar.php';
	
	$sql = ($conecta && $banco) ? "SELECT Nome, Login, Email, Senha, ID FROM usuarios 
				WHERE (((Login = '".$email."') OR (Email = '".$email."')) AND (Senha = md5('".$senha."')));" : "";
	$resultado = mysql_query($sql) or die("<br />ERRO AO EXECUTAR");
		
	if($resultado){
		session_start();
		while ($linha = mysql_fetch_array($resultado)) {
			$_SESSION['Nome'] = $linha["Nome"];
			$_SESSION['Login'] = $linha["Login"];
			$_SESSION['Email'] = $linha["Email"];
			$_SESSION['ID'] = $linha["ID"];
			$_SESSION['Time'] = time();
			echo $_SESSION['Time'];
			echo $_SESSION['Nome'];
			$_SESSION['Controle'] = "login_ok";
		}
		header ("location: ../gerenciador.php");
	} else {
		session_destroy();
		$_SESSION['Controle'] = "login_erro";
		header ("location: ../login.php");
	}
?>