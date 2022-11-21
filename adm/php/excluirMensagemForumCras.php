<?php
    include("../config/conexao.php");

    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_deletar = "DELETE FROM forum_cras WHERE id = :id";
    $query_deletar = $conexao->prepare($sql_deletar);
    $query_deletar->bindParam(':id', $dados['id']);

    if($query_deletar->execute()){
        header('Location: ../../forumCras.php');
    }
?>