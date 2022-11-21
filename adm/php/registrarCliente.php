<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['btnRegistrar'])){

    $usuario = rand(1, 500);
  
        if($dados['nome'] != null && $dados['dataNascimento'] && $dados['telefone'] && 
        $dados['email'] && $dados['senha'] && $dados['endereco']){

            $sql = "SELECT * FROM clientes WHERE email = :email";
            $query = $conexao->prepare($sql);
            $query->bindParam(':email', $dados['email']);
            $query->execute();

            if($query->rowCount() == 1){
                $_SESSION['msgResgistrar'] = "<a style='color: red;'>Esse email já está cadastrado!</a>";
                header('Location: ../../registrarCliente.php');
            }else{

            $sql_cliente = "INSERT INTO clientes(nome,usuario,dataNascimento,telefone,email,senha,endereco) 
            VALUE(:nome,:usuario,:dataNascimento,:telefone,:email,:senha,:endereco)";
            $query_cliente = $conexao->prepare($sql_cliente);
            $query_cliente->bindParam(':nome', $dados['nome']);
            $query_cliente->bindParam(':usuario', $usuario);
            $query_cliente->bindParam(':dataNascimento', $dados['dataNascimento']);
            $query_cliente->bindParam(':telefone', $dados['telefone']);
            $query_cliente->bindParam(':email', $dados['email']);
            $query_cliente->bindParam(':senha', md5($dados['senha']));
            $query_cliente->bindParam(':endereco', $dados['endereco']);

            if($query_cliente->execute()){
                header('Location: ../../loginCliente.php');
            }

            }

        }else{
            $_SESSION['msgResgistrar'] = "<a style='color: red;'>Preencha todos os campos!</a>!";
            header('Location: ../../registrarCliente.php');  
        }
    }

 ?>