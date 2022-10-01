<?php 
// receber o campo imagem
$imagemEnvia = $_POST['imagem'];

// deletar o arquivo
unlink("../imagens/$imagemEnvia");

// redirecionar
header("location:index.php?sucesso=Imagem deletada com sucesso!");
?>