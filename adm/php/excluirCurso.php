<?php
    include("../config/conexao.php");

    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_curso = "DELETE FROM cursos WHERE id = :id";
    $query_curso = $conexao->prepare($sql_curso);
    $query_curso->bindParam(':id', $dados['id']);

    if($query_curso->execute()){
        $_SESSION['msgDeleteCurso'] = "Curso excluido!";
        header('Location: ../listarCursos.php');
    }
?>