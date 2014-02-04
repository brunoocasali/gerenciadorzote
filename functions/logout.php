<?php 
	session_start();
	$_SESSION['Controle'] = "login_saiu";
	header ("location: ../login.php");
 ?>