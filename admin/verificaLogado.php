<?php 
    session_start();

    //se a variavel de sessão $_SESSION['usuario'] "Não(!)" estiver setada redirecionamos o usuário para a tela de login

    if(!isset($_SESSION['usuario'])){
        header("location:../login.php?erro=Faça login para acessar o sistema!");
    }
?>