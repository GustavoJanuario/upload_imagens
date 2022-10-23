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

  <?php include("topo.php"); ?>

  <div class="container bg-white rounded">
    <div class="row mt-5">
      <?php
      //listando as imagens

      //scanear a pasta
      $imagens = scandir("imagens");

      //apaga a posição do array
      unset($imagens[0]);
      unset($imagens[1]);

      //echo "<pre>";
      //  print_r($imagens);
      // echo "<pre>";

      foreach ($imagens as $nomeImagem) {
        echo
          "<div class='col-sm-2'>
            <a href='#' data-toggle='modal' data-target='#modalMostraImagem' data-whatever='$nomeImagem'>
              <img src='imagens/$nomeImagem' class='img-fluid'>
            </a>
          </div> ";
      }

      ?>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalMostraImagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="gerenciaLista.php" method="POST">
          <div class="modal-body">


            <div id="imagemExibe">

            </div>

            <input type="hidden" name="imagem" id="imagemEnvia" value="">

            <input type="hidden" name="operacao" value="adicionar">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
            <button type="submit" class="btn btn-danger">Adicionar à lista</button>
          </div>

        </form>
      </div>
    </div>
  </div>

<!-- importar os arquivos para usar a modal bootstrap -->
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {

      $('#modalMostraImagem').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var imagem = button.data('whatever') // Extrai informação dos atributos data-*

        $("#imagemExibe").html("<img src='imagens/" + imagem + "' class='img-fluid'>");

        // adiconar o nome da imagem no campo hidden
        $("#imagemEnvia").val(imagem);
      })

    });
  </script>

</body>

</html>