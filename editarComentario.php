<?php
    include("includes/layoutForum.php");

    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_comentario = "SELECT * FROM comentarios WHERE id = :id";
    $query_comentario = $conexao->prepare($sql_comentario);
    $query_comentario->bindParam(':id', $dados['id']);
    $query_comentario->execute();
    $row_comentario = $query_comentario->fetch(PDO::FETCH_ASSOC);

?>

<main style="margin-top: 10%;">

    <div class="card" style="margin-top: -4%; margin-left: 10%; width: 80%; border-radius: 6%;">
        <section>
            <div class="container">

                <div class="section-title">
                <h2>Editar Comentário do Forúm</h2>
                </div>
            </div>
        </section>
    </div>

    <div class="card" style="margin-top: -4%; width: 80%; margin-left: 10%; border-radius: 6%;">
            <form action="adm/php/editarComentarioForum.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row_comentario['id'];?>"/>
                        <label class="form-label" style="color: black; font-size: 20px;">Editar Mensagem</label>    
                        <textarea class="form-control" rows="2" name="msg"><?php echo $row_comentario['mensagem'];?></textarea>
                    </div>

                    <div class="col-md-4" style="margin-left: -1%;">
                        <button type="submit" name="btnEditarComentarioForum" class="btn btn-primary" 
                        value="enviar"><i class="fas fa-edit"></i> Editar</button>
                    </div>
                </div>
            </form>
    </div>

    <hr style="width: 60%; margin-left: 20%; margin-bottom: 5%;"/>
</main>


<?php include("includes/footer.php");?>