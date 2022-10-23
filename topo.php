<?php session_start();?>

<div class="container-fluid bg-danger p-1">
    <div class="container">
        
        <div class="row">

            <div class="col-sm-8">
                <h1>
                    <a href="index.php" class="text-white"><i class="far fa-images"></i> Armazém de Imagens </a>
                </h1>
            </div>

            <div class="col-sm-2 text-white align-self-center">
                <a href="minhaLista.php" class="text-white"> Minha lista </a>
            </div>

            <div class="col-sm-2 align-self-center">
                <?php 
                    // se a variável $_SESSION['usuario'] existir exibimos o link para acessar a área administrativa sem passar pela tela de login

                    if(isset($_SESSION['usuario'])){
                    ?>
                     
                        <a href="admin/index.php" class="text-white">
                            <?php echo $_SESSION['usuario'];?> <i class="fas fa-sign-in-alt"></i>
                        </a>
                     
                    <?php } else { 
                        // mostrar o link para entrar (tela de login)
                    ?>

                        <a href="login.php" class="text-white"> Entrar <i class="fas fa-sign-in-alt"></i></a>

                    <?php } ?>

            </div>

        </div>

    </div>
</div>