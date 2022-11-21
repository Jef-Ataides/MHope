<?php
    header("Refresh:30");
    include("includes/layoutForum.php");

    $sql_user = "SELECT * FROM clientes WHERE nome = :nome ";
    $query_user = $conexao->prepare($sql_user);
    $query_user->bindParam(':nome', $nomeCliente);
    $query_user->execute();
    $row_user = $query_user->fetch(PDO::FETCH_ASSOC);
    $cliente_id = $row_user['id'];
    $cliente = $row_user['usuario'];
?>

<main style="margin-top: 10%;">

    <div class="card" style="margin-top: -4%; margin-left: 10%; width: 80%; border-radius: 6%;">
        <section>
            <div class="container">
                <p>Obs: Fórum é totalmente anônimo. Apenas mensagem de apoio emocional. Não será tolerado
                    mensagem de qualquer tipo de preconceito de raça, religiosa,
                    orientação sexual, ou de quaisquer outras formas.
                </p>
                <div class="section-title">
                <h2>Forúm</h2>
                </div>
            </div>
        </section>
    </div>

    <div class="card" style="margin-top: -8%; margin-left: 10%; width: 80%; border-radius: 6%;">
            <form action="adm/php/forum.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="cliente_id" value="<?php echo $row_user['id'];?>"/>
                        <input type="hidden" name="cliente" value="<?php echo $row_user['usuario'];?>"/>
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
        $sql = "SELECT * FROM forum ORDER BY id DESC";
        $query = $conexao->prepare($sql);
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $dataBD = $row['data'];
            date_default_timezone_set('America/Sao_Paulo');
            $dataNova = date('d/m/Y', strtotime($dataBD));

    ?>

    <div class="card" id="forum" style="margin-top: 2%; width: 80%; margin-left: 10%; border-radius: 6%;">

        <div class="card-body">

            <div style="height: 50px; background-color: #eccdec; text-align: center; border-width: 2px; border-style: solid; border-radius: 20px; border-color: rgba(0, 0, 0, 0.1);">
                <a style="color: black; font-size: 30px;">Usuário0<?php echo $row['cliente'];?></a><br><br>
            </div><br>
            
            <a style="color: green; font-size: 20px;"><i class="fas fa-comment"></i> <?php echo $row['mensagem'];?></a><br><br>

            <a style="color: green; font-size: 12px;"><i class="fas fa-calendar-alt"></i> <?php echo $dataNova;?></a>
            <?php if($cliente == $row['cliente']){?>
            <a href="editarMensagem.php?id=<?php echo $row['id'];?>" style="color: green; font-size: 12px; margin-left: 2%;">Editar</a>
            <a href="adm/php/excluirMensagem.php?id=<?php echo $row['id'];?>" style="color: red; font-size: 12px;">Exculir</a><br>
            <?php }?> 
            <hr/>
            <br>
        

            <?php
                $forum_id = $row['id'];

                $sql_comentarios = "SELECT * FROM comentarios WHERE forum_id = :forum_id";
                $query_comentarios = $conexao->prepare($sql_comentarios);
                $query_comentarios->bindParam(':forum_id', $forum_id);
                $query_comentarios->execute();

                while($row_comentarios = $query_comentarios->fetch(PDO::FETCH_ASSOC)){

                    $data = $row_comentarios['data'];
                    date_default_timezone_set('America/Sao_Paulo');
                    $dataAtual = date('d/m/Y', strtotime($data));
                   
            ?>
            <a id="comentario" style="color: orangered; font-size: 20px;">Usuário0<?php echo $row_comentarios['cliente'];?>:</a>
            <a style="color: blue; font-size: 18px;"><?php echo $row_comentarios['mensagem'];?></a>
            <br><br>
            <a style="color: orangered; font-size: 12px;"><i class="fas fa-calendar-alt"></i> <?php echo $dataAtual;?></a>
            <?php if($cliente == $row_comentarios['cliente']){?>
            <a href="editarComentario.php?id=<?php echo $row_comentarios['id'];?>" style="color: green; font-size: 12px; margin-left: 2%;">Editar</a>
            <a href="adm/php/excluirComentario.php?id=<?php echo $row_comentarios['id'];?>" style="color: red; font-size: 12px;">Exculir</a><br>
            <?php }?>
            <hr/>
            <?php
                }
            ?>
            <form action="adm/php/forum.php" method="POST">

            <input type="hidden" name="forum_id" value="<?php echo $row['id'];?>"/>
            <input type="hidden" name="cliente" value="<?php echo $cliente;?>"/>
            <a style="color: green;">Comentar:</a> <textarea class="form-control" rows="2" name="comentario"></textarea><a style="color: blue;"></a><br>
            
            <button type="submit" name="btnForumResposta" class="btn btn-success" 
                        value="enviar"><i class="fas fa-comments"></i> Comentar</button>
             
            
            </form>            
        </div>
    </div>
    <?php
            }
        ?>
</main>