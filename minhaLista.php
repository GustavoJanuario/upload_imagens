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

        <h1>Minha Lista</h1>
        <div class="row mt-5">
            <?php
            if (isset($_SESSION['imagensLista'])) {

                //listando as imagens

                //armazenar a session que contem o array com as imagens
                $imagens = $_SESSION['imagensLista'];

                //echo "<pre>";
                //  print_r($imagens);
                // echo "<pre>";

                foreach ($imagens as $nomeImagem) {
                    echo
                    "<div class='col-sm-2'>
                        <img src='imagens/$nomeImagem' class='img-fluid'>
                    </div> ";
                }
            }

            ?>
        </div>

    </div>


</body>

</html>