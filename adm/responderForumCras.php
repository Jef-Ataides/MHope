<?php
    include("includes/layout.php");
    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_resposta = "SELECT * FROM forum_cras WHERE id = :id";
    $query = $conexao->prepare($sql_resposta);
    $query->bindParam(':id', $dados['id']);
    $query->execute();
    $row_resposta = $query->fetch(PDO::FETCH_ASSOC);
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Resposta Forúm CRAS</h1>
    <hr style="width: 80%;">
    <h1>Resposta Forúm CRAS</h1>
    <hr style="width: 80%;">
    <?php
        if(isset($_SESSION['msgResposta'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgResposta']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgResposta']);
        else: endif
    ?>
   
    <form action="php/respostaForumCras.php" method="POST">
        <div class="col-md-4" >
            <a href="historicoMensagem.php?id=<?php echo $row_resposta['cliente_id'];?>" class="btn" style="color: green;">Histórico de Mensagem</a>
        </div>

        <div class="row g-3" style="margin: 0; width: 80%;">
            <input type="hidden" name="id" value="<?php echo $row_resposta['id'];?>"/>
            <div class="form-group">
                <label class="form-label">Mensagem:</label>    
                <textarea class="form-control" rows="4" name="msg"><?php echo $row_resposta['mensagem']?></textarea>
            </div>
        
            <div class="form-group">
                <label class="form-label">Reposta:</label>    
                <textarea class="form-control" rows="2" name="resposta"></textarea>
            </div>

            <div class="col-md-4" >
                <button type="submit" name="btnRespostaForum" class="btn btn-primary" 
                value="enviar">Enviar</button>
            </div>
        </div>
    </form>
</main>