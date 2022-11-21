<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    $id = $dados['id'];

    if($dados['senha'] == $dados['confirmarSenha']){

    $sql = "UPDATE usuarios SET nome = :nome,cpf = :cpf,dataNascimento = :dataNascimento,
    telefone = :telefone,email = :email,endereco = :endereco,senha = :senha
    WHERE id = :id";
    $query = $conexao->prepare($sql);
    $query->bindParam(':nome', $dados['nome']);
    $query->bindParam(':cpf', $dados['cpf']);
    $query->bindParam(':dataNascimento', $dados['dataNascimento']);
    $query->bindParam(':telefone', $dados['telefone']);
    $query->bindParam(':email', $dados['email']);
    $query->bindParam(':endereco', $dados['endereco']);
    $query->bindParam(':senha', md5($dados['senha']));
    $query->bindParam(':id', $dados['id']);

    if($query->execute()){
        $_SESSION['msgPerfil'] = "Usuário atualizado com êxito!";
        header("Location: ../atualizarPerfil.php?id=$id");
    }

    }else{
        $_SESSION['msgPerfil'] = "<a style='color: red;'>Senhas não compativeis!</a>";
        header("Location: ../atualizarPerfil.php?id=$id");
    }
?> 