<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Armazém de imagens</title>
  </head>

  <body class="bg-light">
    
    <?php include("topo.php");?>

    <div class="container bg-white rounded">

        <div class="row">
            <div class="col-sm-4 offset-sm-4">

                <div class="card mt-5 mb-5">
                    <div class="card-header text-center">
                        <i class="fas fa-lock"></i> Login
                    </div>

                    <div class="card-body">
                    
                        <form action="verificaLogin.php" method="POST">

                            <div class="form-group">
                                <label for="usuario"><i class="fas fa-user"></i> Usuário</label>
                                <input type="text" class="form-control" name="usuario" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="usuario"><i class="fas fa-key"></i> Senha</label>
                                <input type="password" class="form-control" name="senha">
                            </div>

                            <button type="submit" class="btn btn-danger form-control">Entrar</button>
                        </form>

                        <?php 
                            // verificar se existe o paramentro 'erro' enviado via GET
                            // GET é quando o paramentro é enviado pela url ex:
                            //http://localhost/upload_arquivos/login.php?erro=Usu%C3%A1rio%20ou%20senha%20inv%C3%A1lidos!

                            if(isset($_GET['erro'])){
                                $erro = $_GET['erro'];
                                echo "<div class='alert alert-danger mt-2 text-center'> $erro </div>";
                            }
                        ?>

                    </div>

                </div>
                    
            </div>
        </div>

    </div>
    
  </body>
</html>