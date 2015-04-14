<?php
  session_cache_expire(10);
  session_start();
  if (!($_SESSION['name'])){ header ("location: ./login.php"); }
  if (isset($_GET["i"])){
     $_GET["i"];
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
    <title>GerenciadorZote - Gerenciador</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link href='fonts/short.ttf'>
    <link href='fonts/open.ttf'>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/mask.js" /></script>
    <script>
        $('.dropdown-toggle').dropdown();
        $('#myDropdown').on('show.bs.dropdown', function() {
            // do something…
        });
        $(document).ready(function() {
            $("#data").mask("99/99/9999 99:99");
        });
    </script>
    <style type="text/css">
        .list-group {
          color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="images/robo.png" class="robo">
                <h3>Olá!
                    <?php echo $_SESSION['name']; ?>
                </h3>
                <small>Hoje é dia 25 de Novembro de 2013, Segunda-Feira.</small>
                <br />
                <br />
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Adicione Novas Tarefas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form method="post" action="funcoes/task.php">

                                    <div class="col-xs-10">
                                        <input type="text" class="form-control" placeholder="Nome da atividade:" name="nome" required/>
                                        <br />
                                    </div>

                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" placeholder="Quando:" name="data" id="data" />
                                        <br />
                                    </div>
                                    <input type="submit" id="myDropdown" value="Incluir nova tarefa" class="btn btn-success" />
                                    <input type="hidden" name="i" value="<?php echo $_GET["i"];?>"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Adicione Novas Super Listas!
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form method="post" action="funcoes/list.php">
                                    <div class="col-xs-10">
                                        <input type="text" class="form-control" placeholder="Nome da Lista:" name="nome" required/>
                                        <br />
                                    </div>
                                    <input type="submit" id="myDropdown" value="Incluir nova lista" class="btn btn-success" />
                                    <input type="hidden" name="i" value="<?php echo $_SESSION["ID"];?>"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    <br />
    <ul class="list-group">
      <a class="list-group-item active">Uma Lista Várias Tarefas!!</a>
        <?php 
          include_once './funcoes/conectar.php';

          $query = $conecta && $banco ? "SELECT * FROM lists WHERE (user_id = ".$_SESSION["ID"].")" : "";
          $resultado = mysql_query($query) or die("<li class='list-group-item alert alert-danger'>Erroo ao executar :(</li>");
    
          if(mysql_num_rows($resultado) > 0){
            while ($linha = mysql_fetch_array($resultado)) {
              echo "<li class='list-group-item'>
                      <a href='./gerenciador.php?i=".$linha["id"]."'>".$linha["name"]."</a>
                      <a href='./funcoes/deletar.php?i=".$linha["id"]."' style='float:right;'><b style='font-size:17px'>&times</b></a>
                    </li>";
            }
          }
         ?>
    </ul>
  </div>
  <div class="col-lg-8">
    <h2 style="margin-top:30px;"> Próximas atividades... 
      <a href="funcoes/logout.php" style="float:right;" class="btn btn-danger">Sair daqui!</a></h2>
      <!-- PHP Alertas --> 
        <?php 
        switch ($_SESSION['Controle']) {
          case 'incluir_ok':
            echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <strong>Parabéns você conseguiu!!</strong> </div>";
                $_SESSION['Controle'] = "";
          break;
          case 'incluir_erro':
            echo "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <strong>Erroo</strong> Verifique existem informações incorretas!. </div>";
                $_SESSION['Controle'] = "";
          break;
          case 'login_ok':
            echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <strong>Olá!</strong>, comece selecionando uma lista para visualizar as tarefas! </div>";
                $_SESSION['Controle'] = "";
          break;
          default:
          break;  } ?>
      <!-- FIM PHP Alertas --> 
    <br />
    
    <!-- Atividades --> 
       <?php 
          include_once './funcoes/conectar.php';
            if (isset($_GET["i"])) {
              $query = $conecta && $banco ? "SELECT * FROM tasks WHERE ((list_id = '".$_GET["i"]."') AND (done = 0));" : "";
              $resultado = mysql_query($query) or die("<li class='list-group-item alert alert-danger'>
                Erroo ao executar :(</li>");

              if(mysql_num_rows($resultado) > 0){
                while ($linha = mysql_fetch_array($resultado)) {
                  $dateTime = new DateTime($linha["when"], new DateTimeZone('America/Sao_Paulo'));
                  $dt = $dateTime->format("d/m/Y H:i");

                  echo "<div class='list-group'>
                         <div class='list-group-item'>
                           <a href='funcoes/concluir.php?i=".$linha["id"]."&u=".$_GET["i"]."' 
                                style='float:right;' class='btn btn-info'>Concluir?!</a>
                          <h4 class='list-group-item-heading'>".$linha["name"]."</h4>
                          <p class='list-group-item-text'>".$dt."</p>
                         </div> 
                        </div>";
              }
            } else {
              echo "<div class='alert alert-danger'>
                       Ops! Você não possui nenhuma tarefa, Ou você já concluiu tudo, ou ainda não cadastrou...
                    </div>";
              }
            }
         ?>
    <!-- Fim atividades --> 

</div>
</div>
<hr />
<p>
    <small class="footer">Copyright © 2013 - Desenvolvido por Erick Sutil & Bruno Casali</small>
</p>
</body>

</html>
