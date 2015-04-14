<?php session_start();
 if (isset($_SESSION['control']))
 { 
	echo $a =($_SESSION['control'] == "erro_cadastro" ) ? "<div class='alert alert-danger alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <strong>Ei! Tente Novamente </strong> !!.
        </div>" : "";
 }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/ico.png">
    <title>GerenciadorZote - Registro</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href='fonts/short.ttf' rel='stylesheet' type='text/css'>
    <link href='fonts/open.ttf' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container" style="padding-top:10%;">
        <div class="text-login">
            <h2 class="form-signin-heading">Registro GerenciadorZote</h2>
            <img src="images/robo.png" class="robo">
            <br/>
            <p>Projeto criado com HTML E PHP para assim demonstrar uma base do conhecimendo adquirido até o presente momento (2º Semestre, WebDesign).</p>
        </div>
        <form class="form-signin" style="margin-bottom:9px" action="./functions/registrar.php" method="POST">
            <input type="text" style="margin-bottom:9px" class="form-control" placeholder="Seu nome" name="nome" required autofocus/>
            <input type="text" style="margin-bottom:9px" class="form-control" placeholder="Seu login" name="login" required autofocu/s>
            <input type="text" style="margin-bottom:9px" class="form-control" placeholder="E-mail" name="email" required autofocus/>
            <input type="password" style="margin-botton:9px" class="form-control" name="senha" placeholder="Senha" required>
            <button class="btn btn-lg btn-success btn-block register" type="submit">Registrar</button>
            <button class="btn btn-lg btn-warning btn-block register" type="submit">Voltar!</button>
        </form>

    </div>
</body>

</html>
