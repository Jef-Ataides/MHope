<?php
 include_once("../config/conexao.php");
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 date_default_timezone_set('America/Sao_Paulo');
 $data = date('Y-m-d');

 if(!empty($dados['btnForum'])){

    if($dados['msg'] != null){

        $sql_forum = "INSERT INTO forum_cras(data, mensagem, cliente_id) VALUE(:data, :mensagem, :cliente_id)";
        $query = $conexao->prepare($sql_forum);
        $query->bindParam(':data', $data);
        $query->bindParam(':mensagem', $dados['msg']);
        $query->bindParam(':cliente_id', $dados['cliente_id']);
        
        if($query->execute()){
            header("Location: ../../forumCras.php");
        }

    }
 }

 ?>