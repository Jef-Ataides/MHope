<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql = "DELETE FROM videos WHERE id = :id";
    $query = $conexao->prepare($sql);
    $query->bindParam(':id', $dados['id']);
    if($query->execute()){
        $_SESSION['msgVideo'] = "Vídeo excluido!";
        header('Location: ../listarVideo.php');
    }
?>