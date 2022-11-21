<?php
    include("includes/layout.php");

    $sql_contato = "SELECT * FROM contatos";
    $sql_query = $conexao->prepare($sql_contato);
    $sql_query->execute();

    $row_contato = $sql_query->fetch(PDO::FETCH_ASSOC);
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Cantato</h1>
    <hr style="width: 80%;">
    <h1>Cantato</h1>

    <?php
        if(isset($_SESSION['msgContato'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgContato']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgContato']);
        else: endif
    ?>

    <form action="php/editarContato.php" method="POST">
        <div style="margin-top: 4%;">
        <hr style="width: 80%;">
            <div class="row g-3" style="margin: 0;">
                <input type="hidden" class="form-control" name="id"
                    value="<?php echo $row_contato['id'];?>"/>
                <div class="col-md-5">
                    <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco"
                    value="<?php echo $row_contato['endereco'];?>"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Cidade:</label>
                    <input type="text" class="form-control" name="cidade"
                    value="<?php echo $row_contato['cidade'];?>"/>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Estado:</label>
                    <input type="text" class="form-control" name="estado"
                    value="<?php echo $row_contato['estado'];?>"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                
                <div class="col-md-5">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email"
                    value="<?php echo $row_contato['email'];?>"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Telefone:</label>
                    <input type="tel" class="form-control" name="telefone"
                    value="<?php echo $row_contato['telefone'];?>"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                
                <div class="col-md-3">
                    <label class="form-label">Facebook:</label>
                    <input type="text" class="form-control" name="facebook"
                    value="<?php echo $row_contato['facebook'];?>" placeholder="https://www.facebook.com/NOME_DO_USER"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Instagram:</label>
                    <input type="text" class="form-control" name="instagram"
                    value="<?php echo $row_contato['instagram'];?>" placeholder="https://www.instagram.com/NOME_DO_USER"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Twitter:</label>
                    <input type="text" class="form-control" name="twitter"
                    value="<?php echo $row_contato['twitter'];?>" placeholder="https://twitter.com/NOME_DO_USER"/>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnContato" class="btn btn-primary" value="cadastrar">
                <i class="fas fa-edit"></i>
                    Atualizar</button>
            </div>
        </div>
    </form>
    <hr style="width: 80%;">
</main>