<?php session_start(); 
    
    // caso a variável de sessão !não exista criamos ela e adicionamos o array
    if(!isset($_SESSION['imagensLista'])){

        $_SESSION['imagensLista'] = array();
    }

    $operacao = $_POST['operacao'];

    // se a operação for igual a 'adicionar' adicionamos o nome da imagem na session
    if($operacao == 'adicionar'){

        $imagem = $_POST['imagem'];

        $_SESSION['imagensLista'][$imagem] = $imagem;

        //redirecionar para a página com a lsita de imagens
        header("location:minhaLista.php");
    }


    echo "<pre>";
    print_r($_SESSION['imagensLista']);

?>