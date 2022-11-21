<?php
    include_once("../config/conexao.php");
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $curso_id = $dados['curso_id'];

    if(!empty($dados['btnCursoMatricula'])){
        if($dados['curso_id'] != null && $dados['nome'] != null && $dados['telefone'] != null && 
        $dados['email'] != null && $dados['endereco'] != null && $dados['dataNascimento'] != null){

            $sql_matricula = "INSERT INTO matricula_cursos(nome, telefone, email, dataNascimento, endereco, curso_id)
             VALUE(:nome, :telefone, :email, :dataNascimento, :endereco, :curso_id)";
            $query_matricula = $conexao->prepare($sql_matricula);
            $query_matricula->bindParam(':nome', $dados['nome']);
            $query_matricula->bindParam(':telefone', $dados['telefone']);
            $query_matricula->bindParam(':email', $dados['email']);
            $query_matricula->bindParam(':dataNascimento', $dados['dataNascimento']);
            $query_matricula->bindParam(':endereco', $dados['endereco']);
            $query_matricula->bindParam(':curso_id', $dados['curso_id']);
            
            if($query_matricula->execute()){
                $_SESSION['msgMatricula'] = "Matriculado com êxito!";
                header('Location: ../../matricularCurso.php?id='.$curso_id);
            }

        }else{
            $_SESSION['msgMatricula'] = "<p style='color: red;'>ATENÇÃO: Preencha todos os campos!</p>";
            header('Location: ../../matricularCurso.php');
        }
    }
?>