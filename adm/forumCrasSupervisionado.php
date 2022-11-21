<?php
    include("includes/layout.php");

    $sql_resposta = "SELECT * FROM forum ORDER BY id DESC";
    $query = $conexao->prepare($sql_resposta);
    $query->execute();
?>  

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Histórico Forúm</h1>
    <hr style="width: 80%;">
    <h1>Histórico Forúm</h1>
    <hr style="width: 80%;">

    <?php
        while($row_historico = $query->fetch(PDO::FETCH_ASSOC)){
            $data = $row_historico['data'];
            date_default_timezone_set('America/Sao_Paulo');
            $dataNova = date('d/m/Y', strtotime($data));
      
    ?>
    <a style="color: rebeccapurple;"><?php echo $dataNova;?></a><br>
    <a style="color: black;"><?php echo $row_historico['cliente'] . " :"?></a>
    <a style="color: blue; text-justify: auto;"><?php echo $row_historico['mensagem'];?></a><br>
    <a href="php/excluirHistoricoForum.php?id=<?php echo $row_historico['id'];?>" style="color: red;"><i class="fas fa-trash"></i></a><br><br>
    <?php
        }
    ?>
</main>