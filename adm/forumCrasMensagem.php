<?php
    include("includes/layout.php");

    $sql_forum = "SELECT cli.nome, forum.data, forum.mensagem, forum.id, forum.resposta
                  FROM clientes cli
                  INNER JOIN forum_cras AS forum ON forum.cliente_id = cli.id
                  ORDER BY cli.id ASC";
    $query_forum = $conexao->prepare($sql_forum);
    $query_forum->execute();
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Forúm CRAS</h1>
    <hr style="width: 80%;">
    <h1>Forúm CRAS</h1>
    <hr style="width: 80%;">
    <table class="table" style="width: 90%;">
    <thead>
        <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Data</th>
        <th scope="col">Mensagem</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <?php
            while($row_forum = $query_forum->fetch(PDO::FETCH_ASSOC)){
                if($row_forum['resposta'] == null){
                    $novaData = date('d/m/Y', strtotime($row_forum['data']));
                   
    ?>
    <tbody>
        <tr>
            <th scope="row"><?php echo $row_forum['nome'];?></th>
            <td style="width: 10%;"><?php echo $novaData;?></td>
            <td><?php echo $row_forum['mensagem'];?></td>
            <td style="width: 12%;">
                <a href="responderForumCras.php?id=<?php echo $row_forum['id'];?>" 
                style="color: yellowgreen" class="btn"><i class="fas fa-edit"></i> Responder</a>
            </td>
        </tr>
    </tbody>
    <?php
        }}
    ?>
    </table>

    <hr style="width: 80%;">
</main>