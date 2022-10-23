<?php include("verificaLogado.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">

  <title>Armazém de imagens</title>
</head>

<body class="bg-light">
  <?php

  ?>

  <?php include("topo.php"); ?>

  <div class="container bg-white rounded">

    <div class="row">
      <div class="col-sm-6 offset-sm-3">

        <div class="card mt-5 mb-5">
          <div class="card-header text-center">
            <i class="fas fa-upload"></i> Upload de imagem
          </div>

          <div class="card-body">
            <!-- enctype - enviar arquivo da maquina via formulário -->
            <form action="copiaArquivo.php" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label>Selecione a imagem</label>
                <input type="file" name="imagem" class="form-control p-1" accept="image/*" required>
              </div>

              <button type="submit" class="btn btn-danger form-control">Cadastrar</button>
            </form>

            <?php
            // verificar se existe o paramentro 'erro' enviado via GET
            // GET é quando o paramentro é enviado pela url ex:
            //http://localhost/upload_arquivos/login.php?erro=Usu%C3%A1rio%20ou%20senha%20inv%C3%A1lidos!

            if (isset($_GET['erro'])) {
              $erro = $_GET['erro'];
              echo "<div class='alert alert-danger mt-2 text-center'> $erro </div>";
            }

            //exibir a mensagem após o arquivo ser copiado
            if (isset($_GET['sucesso'])) {
              $sucesso = $_GET['sucesso'];
              echo "<div class='alert alert-success mt-2 text-center'> $sucesso </div>";
            }
            ?>

          </div>

        </div>

      </div>
    </div>

    <div class="row">
      <?php
      //listando as imagens

      //scanear a pasta
      $imagens = scandir("../imagens");

      //apaga a posição do array
      unset($imagens[0]);
      unset($imagens[1]);

      //echo "<pre>";
      //  print_r($imagens);
      // echo "<pre>";

      foreach ($imagens as $nomeImagem) {
        echo
        "<div class='col-sm-2'>
          <img src='../imagens/$nomeImagem' class='img-fluid'>
          <button class='btn btn-danger mt-2'
            type='button'
            data-toggle='modal' data-target='#modalDeletaImagem' data-whatever='$nomeImagem'>
            <i class='fas fa-trash'></i> Apagar
          </button>
        </div> ";
      }

      ?>
    </div>

  </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDeletaImagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deletar Imagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="deletaImagem.php" method="POST">
          <div class="modal-body">

            <p>Tem certeza que deseja exluir esta imagem?</p>

            <div id="imagemDeleta">

            </div>

            <input type="hidden" name="imagem" id="imagemEnvia" value="">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- importar os arquivos para usar a modal bootstrap -->
  <script src="../js/jquery-3.6.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {

      $('#modalDeletaImagem').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var imagem = button.data('whatever') // Extrai informação dos atributos data-*

        $("#imagemDeleta").html("<img src='../imagens/" + imagem + "' class='img-fluid'>");

        // adiconar o nome da imagem no campo hidden
        $("#imagemEnvia").val(imagem);
      })

    });
  </script>

</body>

</html>