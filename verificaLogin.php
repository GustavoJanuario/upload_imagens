<?php 

    //acessar a sessao
    session_start();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuarioSistema = 'admin';
    $senhaSistema = '123456';

    if($usuario == $usuarioSistema && $senha == $senhaSistema){
        //criar uma variável de sessão para armazenar o nome do usuario
        $_SESSION['usuario'] = $usuario;
        header("location:admin/index.php");
    }else{
        header("location:login.php?erro=Usuário ou senha inválidos!");
    }
?>