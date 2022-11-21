<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = $dados['id'];

    if(!empty($dados['btnEditarComentarioForum'])){
        $sql_comentario = "UPDATE comentarios SET mensagem = :mensagem WHERE id = :id";
        $query_comentario = $conexao->prepare($sql_comentario );
        $query_comentario->bindParam(':mensagem', $dados['msg']);
        $query_comentario->bindParam(':id', $dados['id']);
        
        if($query_comentario->execute()){
            $_SESSION['msgEditComentario'] = "Editado!";
            header('Location: ../../forumSupervisionado.php');
        }
    }
?>