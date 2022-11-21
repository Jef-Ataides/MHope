<?php
 include_once("../config/conexao.php");
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 if($dados){
    $descricao= filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING);
    $arquivo_nome = $_FILES['arquivo']['name'];
    //var_dump($_FILES['arquivo']);

    $sql = "INSERT INTO videos (nome, tipo, descricao, arquivo) 
    VALUES (:nome, :tipo, :descricao, :arquivo)";
    $insert_arquivo = $conexao->prepare($sql);
    $insert_arquivo->bindParam(':nome', $dados['nome']);
    $insert_arquivo->bindParam(':tipo', $dados['tipo']);
    $insert_arquivo->bindParam(':descricao', $descricao);
    $insert_arquivo->bindParam(':arquivo', $arquivo_nome);

    if($insert_arquivo->execute()){

        $ultimo_id = $conexao->lastInsertId();
    
        $diretorio = '../update/videos/';
        mkdir( $diretorio, 0755);
    
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$arquivo_nome)){
            $_SESSION['msgUploadVideo'] = "<p style='color:green'>Upload feito com sucesso!</p>";
            header("Location: ../uploadVideo.php");
    
        }else{
            $_SESSION['msgUploadVideo'] = "<p style='color:yellow'>Erro no upload!</p>";
            header("Location: ../uploadVideo.php");
        }
    
        $_SESSION['msgUploadVideo'] = "Arquivo salvo com sucesso!";
        header("Location: ../uploadVideo.php");
    
    }else{
        $_SESSION['msgUploadVideo'] = "<p style='color:red'>Erro ao salvar!</p>";
        header("Location: ../uploadVideo.php");
    }
 }else{
    $_SESSION['msgUploadVideo'] = "<p style='color:red'>Erro ao salvar!</p>";
    header("Location: ../uploadVideo.php");
}
 
?>