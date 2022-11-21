<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($dados['btnCadastrarUser'])){


        if($dados['senha'] == $dados['confirmarSenha']){
            if($dados['email'] != null){

                if($dados['senha'] != null){
                       
                    $sql= "SELECT * FROM usuarios WHERE email = :email";
                    $query = $conexao->prepare($sql);
                    $query->bindParam(':email', $dados['email']);
                    $query->execute();

                    if($query->rowCount() == 1){
                        $_SESSION['msgUsuario'] = "<a style='color: red;'>Esse email já está cadastrado!</a>!";
                        header('Location: ../../registrarCliente.php');
                    }else{

                        $sql_usuarios = "INSERT INTO usuarios(nome,cpf,dataNascimento,telefone,email,endereco,senha) 
                        VALUE(:nome,:cpf,:dataNascimento,:telefone,:email,:endereco,:senha)";
                        $query_usuarios = $conexao->prepare($sql_usuarios);
                        $query_usuarios->bindParam(':nome', $dados['nome']);
                        $query_usuarios->bindParam(':cpf', $dados['cpf']);
                        $query_usuarios->bindParam(':dataNascimento', $dados['dataNascimento']);
                        $query_usuarios->bindParam(':telefone', $dados['telefone']);
                        $query_usuarios->bindParam(':email', $dados['email']);
                        $query_usuarios->bindParam(':endereco', $dados['endereco']);
                        $query_usuarios->bindParam(':senha', md5($dados['senha']));

                        if($query_usuarios->execute()){
                            $_SESSION['msgUsuario'] = "Usuário cadastrado com êxito!";
                            header('Location: ../cadastrarUsuario.php');
                        }
                    }
                }else{
                    $_SESSION['msgUsuario'] = "<p style='color: red;'>ATENÇÃO: Prescisa informar a senha!</p>";
                    header('Location: ../cadastrarUsuario.php');
                }
            }else{
                $_SESSION['msgUsuario'] = "<p style='color: red;'>ATENÇÃO: Prescisa informar o email!</p>";
                header('Location: ../cadastrarUsuario.php');
            }
        }else{
            $_SESSION['msgUsuario'] = "<p style='color: red;'>ATENÇÃO: Senha não confirmada! Por favor,
             informe as senhas iguais para confirmar.</p>";
            header('Location: ../cadastrarUsuario.php');
        }

    }
?>