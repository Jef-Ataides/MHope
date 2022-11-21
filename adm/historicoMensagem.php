<?php
    include("includes/layout.php");
    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_clientes = "SELECT * FROM clientes WHERE id = :id ORDER BY id DESC";
    $query_clientes = $conexao->prepare($sql_clientes);
    $query_clientes->bindParam(':id', $dados['id']);
    $query_clientes->execute();
    $row_clientes = $query_clientes->fetch(PDO::FETCH_ASSOC);

    $sql_resposta = "SELECT * FROM forum_cras WHERE cliente_id = :cliente_id ORDER BY id DESC";
    $query = $conexao->prepare($sql_resposta);
    $query->bindParam(':cliente_id', $dados['id']);
    $query->execute();
?>  

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Resposta Forúm CRAS</h1>
    <hr style="width: 80%;">
    <h1>Histórico Forúm CRAS</h1>
    <hr style="width: 80%;">

    <?php
        while($row_historico = $query->fetch(PDO::FETCH_ASSOC)){
    ?>
    <a style="color: rebeccapurple;"><?php echo $row_historico['data'];?></a><br>
    <a style="color: black;"><?php echo $row_clientes['nome'] . " :"?></a>
    <a style="color: blue; text-justify: auto;"><?php echo $row_historico['mensagem'];?></a><br><br>
    <a style="color: green;"><?php echo "Resposta: " . $row_historico['resposta'];?></a><br><hr>
    <?php
        }
    ?>
</main>