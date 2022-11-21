<?php
 include_once("../config/conexao.php");
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 if(!empty($dados['btnCadastrarJogo'])){

    $sql = "INSERT INTO jogos(nome,descricao,link) VALUE(:nome,:descricao,:link)";
    $query = $conexao->prepare($sql);
    $query->bindParam(':nome', $dados['nome']);
    $query->bindParam(':descricao', $dados['descricao']);
    $query->bindParam(':link', $dados['link']);
    if($query->execute()){
        $_SESSION['msgJogo'] = "Jogo cadastrado com êxito!";
        header('Location: ../linksJogos.php');
    }
 }

 ?>