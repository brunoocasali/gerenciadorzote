<?php 
	//Conectar ao SGDB
	$conecta = mysql_connect("127.0.0.1:3306","root","@ceicom123") or die("<br />Erro ao Conectar meu Jovem!");
	//Selecionar a database
	$banco = $conecta ? mysql_select_db("tasks") or die("<br /> Agora deu pau com o Banco") : "";
 ?>