<?php 
// recebendo campo do tipo 'file'

//print_r(phpinfo());

$nomeArquivo = $_FILES['imagem']['name'];
$tipoArquivo = $_FILES['imagem']['type'];
$tamanhoArquivo = $_FILES['imagem']['size'];
$arquivoTemporario = $_FILES['imagem']['tmp_name'];

//validar o tipo de arquivo e o tamanho

$mensagemErro = "";

/*
if(!str_contains($tipoArquivo, 'image')){
    $mensagemErro = "<p>Permitido somente arquivo do tipo imagem!</p>";
}
*/

$dadosTipoArquivo = explode('/', $tipoArquivo);

//echo "<pre>";
//print_r($dadosTipoArquivo);
//echo "<pre>";

if($dadosTipoArquivo[0] != 'image'){
    $mensagemErro = "<p>Permitido somente arquivo do tipo imagem!</p>";
}

//converter o valor de bytes para megabytes
$tamanhoArquivoMB = $tamanhoArquivo / 1024 / 1024;

if($tamanhoArquivoMB > 1){
    // .= incrementa um valor na variavel sem apagar o conteudo existente
    $mensagemErro .= "<p>Permitido arquivos de até 1MB!</p>" ;
}

echo $mensagemErro;


//verificar a variavel $mensagemErro
if($mensagemErro != ""){
    header("location:index.php?erro=$mensagemErro");
}else{
    $extensaoArquivo = strchr($nomeArquivo,".");

    //novo nome do arquivo para não se repetir
    $novoNomeArquivo = "imagem".time().$extensaoArquivo;
    
    $copiaArquivo = copy($arquivoTemporario, "../imagens/$novoNomeArquivo");
    
    //verificar se a copia do arquivo foi executada corretamente
    if($copiaArquivo == true){
        header("location:index.php?sucesso=Imagem copiada com sucesso!");
    }else{
        header("location:index.php?erro=Não foi possível copiar, contate o administrador!");
    }

}

?>