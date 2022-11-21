<?php
    include("../config/conexao.php");

    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_jogo = "DELETE FROM jogos WHERE id = :id";
    $query_jogo = $conexao->prepare($sql_jogo);
    $query_jogo->bindParam(':id', $dados['id']);

    if($query_jogo->execute()){
        $_SESSION['msgDeleteJogo'] = "Jogo excluido!";
        header('Location: ../listaJogos.php');
    }
?>