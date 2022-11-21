<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['btnRespostaForum'])){

        if($dados['resposta'] != null){

            $sql_forum = "UPDATE forum_cras SET resposta = :resposta WHERE id = :id";
            $query = $conexao->prepare($sql_forum);
            $query->bindParam(':resposta', $dados['resposta']);
            $query->bindParam(':id', $dados['id']);

            if($query->execute()){
                $_SESSION['msgResposta'] = "Resposta enviada com êxito!";
                header("Location: ../responderForumCras.php?id=".$dados['id']);
            }
        }
    }
?>