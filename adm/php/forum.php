<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $dataAtual = date('d/m/Y', strtotime($data));


    if(!empty($dados['btnForum'])){
       
        $sql_forum = "INSERT INTO forum(mensagem, data, cliente_id, cliente) 
        VALUE(:mensagem, :data, :cliente_id, :cliente)";
        $query_forum = $conexao->prepare($sql_forum);
        $query_forum->bindParam(':mensagem', $dados['msg']);
        $query_forum->bindParam(':data', $data);
        $query_forum->bindParam(':cliente_id', $dados['cliente_id']);
        $query_forum->bindParam(':cliente', $dados['cliente']);
        
        if($query_forum->execute()){
            header("Location: ../../forumSupervisionado.php#forum");
        }
    }

    if(!empty($dados['btnForumResposta'])){

        var_dump($dados);

       $sql_comentarios = "INSERT INTO comentarios(mensagem, cliente, forum_id, data) 
       VALUE(:mensagem, :cliente, :forum_id, :data)";
       $query_comentarios = $conexao->prepare($sql_comentarios);
       $query_comentarios->bindParam(':mensagem', $dados['comentario']);
       $query_comentarios->bindParam(':cliente', $dados['cliente']);
       $query_comentarios->bindParam(':forum_id', $dados['forum_id']);
       $query_comentarios->bindParam(':data', $data);
       
       if($query_comentarios->execute()){
            header("Location: ../../forumSupervisionado.php#comentario Refresh:0" );
       }
       
    }
 
 ?>