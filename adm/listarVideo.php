<?php
    include("includes/layout.php");
?>
<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Lista de Vídeo</h1>
    <hr style="width: 80%;">
    <h1>Lista de Vídeo</h1>
    <hr style="width: 80%;">

    <?php
        if(isset($_SESSION['msgVideo'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgVideo']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgVideo']);
        else: endif
    ?>

        <table class="table" style="width: 60%; margin-top: 2%;">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Vídeo</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>

            <?php
                $sql = "SELECT * FROM videos ORDER BY id ASC ";
                $sql_query = $conexao->prepare($sql);
                $sql_query->execute();

                while($rowVideo = $sql_query->fetch(PDO::FETCH_ASSOC)){  
            ?>

            <tbody>
                <tr>
                    <td><?php echo $rowVideo['nome'];?></td>
                    <td><?php echo $rowVideo['tipo'];?></td>
                    <td>
                        <a href="update/videos/<?php echo $rowVideo['arquivo'];?>">
                        <video width="80" src="update/videos/<?php echo $rowVideo['arquivo'];?>"></video>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="php/deletarVideos.php?id=<?php echo $rowVideo['id'];?>" 
                            role="button"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
</main>