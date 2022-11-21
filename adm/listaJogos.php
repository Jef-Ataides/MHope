<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Lista Link de Jogos</h1>
    <hr style="width: 80%;">
    <h1>Lista Link de Jogos</h1>
    <hr style="width: 80%;">
 
    <?php
        if(isset($_SESSION['msgDeleteJogo'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgDeleteJogo']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgDeleteJogo']);
        else: endif
    ?>

    <table class="table" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">Curso</th>
                <th scope="col">Descrição</th>
                <th scope="col">Link</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM jogos ORDER BY id ASC ";
            $query = $conexao->prepare($sql);
            $query->execute();
            while($row_jogo = $query->fetch(PDO::FETCH_ASSOC)){
            
        ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo $row_jogo['nome'];?></th>
                <td style="width: 80%;"><?php echo $row_jogo['descricao'];?></td>
                <td><?php echo $row_jogo['link'];?></td>
                <td style="width: 12%;">
                    <a style="color: red;" href="php/excluirJogo.php?id=<?php echo $row_jogo['id'];?>"  class="btn"><i class="fas fa-trash-alt"></i>Excluir</a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    <hr style="width: 80%;">

 
</main>