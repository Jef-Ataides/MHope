<?php
 include_once("../config/conexao.php");
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 if(!empty($dados['btnCadastrarCuso'])){

    $imagem = $_FILES['imagem']['name'];

    $sql_cursos = "INSERT INTO cursos(nome, descricao, imagem, informacao) VALUE(:nome, :descricao, :imagem, :informacao)";
    $query_cursos = $conexao->prepare($sql_cursos);
    $query_cursos->bindParam(':nome', $dados['nome']);
    $query_cursos->bindParam(':descricao', $dados['descricao']);
    $query_cursos->bindParam(':imagem', $imagem);
    $query_cursos->bindParam(':informacao', $dados['informacao']);

    if($query_cursos->execute()){

        $ultimo_id = $conexao->lastInsertId();
        $diretorio = '../update/img/';
        mkdir( $diretorio, 0755);

        
    if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem)){
        $_SESSION['msgCurso'] = "<p style='color:green'>Upload feito com sucesso!</p>";
        header("Location: ../cadastrarCurso.php");

    }else{
        $_SESSION['msgCurso'] = "<p style='color:yellow'>Erro no upload!</p>";
        header("Location: ../cadastrarCurso.php");
    }

    $_SESSION['msgCurso'] = "Arquivo salvo com sucesso!";
    header("Location: ../cadastrarCurso.php");
    }
 }
?>