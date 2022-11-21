<?php
    include("includes/layoutForum.php");
    include_once("adm/config/conexao.php");

    $sql_user = "SELECT * FROM clientes WHERE nome = :nome ";
    $query_user = $conexao->prepare($sql_user);
    $query_user->bindParam(':nome', $nomeCliente);
    $query_user->execute();
    $row_user = $query_user->fetch(PDO::FETCH_ASSOC);
    $cliente_id = $row_user['id'];
?>

<main style="margin-top: 10%;">

    <div class="card" style="margin-top: -4%; margin-left: 10%; width: 80%; border-radius: 6%;
    background-color: white;">
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Fale com CRAS</h2>
                </div>
            </div>
        </section>
    </div>

    <div class="card" style="margin-top: -8%; margin-left: 10%; width: 80%; border-radius: 6%;">
            <form action="adm/php/forumCras.php" method="POST">
            <div class="card-body">
                <input type="hidden" name="cliente_id" value="<?php echo $row_user['id'];?>"/>
                <input type="hidden" name="nome" value="<?php echo $row_user['nome'];?>"/>
                <div class="form-group">
                    <label class="form-label" style="color: black; font-size: 20px;">Enviar Mensagem</label>  
                    <textarea class="form-control" rows="2" name="msg"></textarea>
                </div>

                <div class="col-md-4" style="margin-left: -1%;">
                    <button type="submit" name="btnForum" class="btn btn-primary" 
                    value="enviar"><i class="fas fa-comment-alt"></i> Enviar</button>
                </div>
            </div>
            </form>
    </div>
    <hr style="width: 60%; margin-left: 20%;"/>
    <?php
        $sql_cli = "SELECT * FROM forum_cras WHERE cliente_id = :cliente_id ORDER BY id DESC";
        $query_cli = $conexao->prepare($sql_cli);
        $query_cli->bindParam(':cliente_id', $cliente_id);
        $query_cli->execute();

    ?>


    <div class="card" style="margin-top: 2%; width: 80%; margin-left: 10%; border-radius: 6%;">

        <?php
            while($row_cli = $query_cli->fetch(PDO::FETCH_ASSOC)){
                $data = $row_cli['data'];
                date_default_timezone_set('America/Sao_Paulo');
                $dataNova = date('d/m/Y', strtotime($data));
                
        ?>
        <div class="card-body">

            <div style="height: 55px; background-color: #eccdec; text-align: center; border-width: 2px; border-style: solid; border-radius: 20px; border-color: rgba(0, 0, 0, 0.1);">
                <a style="color: black; font-size: 30px;"> <?php echo $row_user['nome'];?></a><br><br>
            </div><br>

            <a style="color: green; font-size: 20px;"><i class="fas fa-comment"></i> <?php echo $row_cli['mensagem'];?></a><br>

            <a style="color: gray; font-size: 12px;"><i class="fas fa-calendar-alt"></i> <?php echo $dataNova;?></a>

            <a href="editarMensagemForum.php?id=<?php echo $row_cli['id'];?>" style="color: green; font-size: 12px; margin-left: 2%;">Editar</a>
            <a href="adm/php/excluirMensagemForumCras.php?id=<?php echo $row_cli['id'];?>" style="color: red; font-size: 12px;">Exculir</a><br>
            <br>
            <hr/>
            <a style="color: orangered; font-size: 20px;">Resposta:</a> <a style="color: blue; font-size: 20px;"><?php echo $row_cli['resposta'];?></a>
            <hr/>
        </div>

        <?php
            }
        ?>
    </div>
</main>