<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Cadastro Link de Jogos</h1>
    <hr style="width: 80%;">
    <h1>Cadastro Link de Jogos</h1>
    <?php
        if(isset($_SESSION['msgJogo'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgJogo']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgJogo']);
        else: endif
    ?>

    <form action="php/cadastrarJogos.php" method="POST">
        <div style="margin-top: 4%;">
        <hr style="width: 80%;">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Nome do Jogo:</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Descrição do Jogo:</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                <div class="col-md-10">
                    <label class="form-label">Link do Jogo:</label>
                    <input type="text" class="form-control" name="link"/>
                </div>
            </div>
           
        </div>
        
        <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnCadastrarJogo" class="btn btn-primary" value="cadastrar">
                    <i class="fas fa-save"></i>
                    Cadastrar</button>
        </div>
        <hr style="width: 80%;">
    </form>
</main>