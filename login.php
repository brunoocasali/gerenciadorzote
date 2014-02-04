<?php 
  session_start();
    if(isset($_SESSION['Controle']) && ($_SESSION['Controle'] == "novo_user")) {
      echo "<div class='alert alert-info alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <strong>Seja-Bem Vindo</strong> Essa é sua primeira vez por aqui então, começe fazendo seu Login!!!.
            </div>";
      $_SESSION['Controle'] = ""; 
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
    <title>GerenciadorZote - Login</title>
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="css/estilo.css" rel="stylesheet">
    <link href='fonts/short.ttf' rel='stylesheet' type='text/css'>
    <link href='fonts/open.ttf' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container" style="padding-top:10%;">
        <div class="text-login">
            <h2 class="form-signin-heading">Bem vindo(a) ao GerenciadorZote</h2>
            <img src="images/robo.png" class="robo">
            <br/>
            <p>Projeto criado com HTML E PHP para assim demonstrar uma base do conhecimendo adquirido até o presente momento (2º Semestre, WebDesign).</p>
        </div>

  <!-- PHP Alertas! -->
    <?php 
      if(isset($_SESSION['Controle'])) { 
        switch ($_SESSION['Controle']) {
          case 'login_erro':
            echo "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <strong>Cacild's! sua ação retornou um ERRO</strong> Tente novamente!.
                </div>";
          break;
          case 'login_saiu':
          session_destroy();
            echo "<div class='alert alert-info alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <strong>Até Mais!</strong> Volte Sempre!.
                </div>";
          break;
          default:
          break;  
        }  
      }   ?>
        
  <!-- FIM PHP Alertas! -->
<form class="form-signin" method="post" action="funcoes/logar.php">
    <!--<p>E-mail ou Login:</p> -->
    <input type="text" class="form-control" placeholder="E-mail ou Login" name="email" required autofocus>
    <br />
    <!--<p>&nbsp;</p>
     <p>Senha:</p> -->
    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block enter" type="submit">Entrar</button>
    <a href="registro.php" class="btn btn-lg btn-success btn-block register">Registrar</a>
</form>
</div>
</body>

</html>