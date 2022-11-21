<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['btnContato'])){

        $sql_contato = "UPDATE contatos SET endereco = :endereco, cidade = :cidade, telefone = :telefone,
        email = :email, instagram = :instagram, facebook = :facebook, twitter = :twitter
        WHERE id = :id";
        $query_contatos = $conexao->prepare($sql_contato);
        $query_contatos->bindParam(':endereco', $dados['endereco']);
        $query_contatos->bindParam(':cidade', $dados['cidade']);
        $query_contatos->bindParam(':email', $dados['email']);
        $query_contatos->bindParam(':telefone', $dados['telefone']);
        $query_contatos->bindParam(':instagram', $dados['instagram']);
        $query_contatos->bindParam(':facebook', $dados['facebook']);
        $query_contatos->bindParam(':twitter', $dados['twitter']);
        $query_contatos->bindParam(':id', $dados['id']);
        

        if($query_contatos->execute()){
            $_SESSION['msgContato'] = "Contato atualizado com êxito!";
            header('Location: ../contato.php');
        }

    }
?>