<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -8%; color: white;">Cadastro de Curso</h1>
    <hr style="width: 80%;">
    <h2>Cadastro de Curso</h2>
    <?php
        if(isset($_SESSION['msgCurso'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgCurso']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgCurso']);
        else: endif
    ?>

    <form action="php/cadastrarCursos.php" method="POST" enctype="multipart/form-data">
        <div style="margin-top: 4%;">
        <hr style="width: 80%; margin-top: -2%;">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Nome do Curso:</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Descrição do Curso:</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Selecione Imagem:</label>
                    <input type="file" class="form-control" name="imagem" accept="image/png, image/jpeg"  multiple/>
                </div>
            </div>
        </div>

        <div class="row g-3" style="margin: 0;">
                <div class="col-md-10">
                    <label class="form-label">Informações sobre o Curso:</label>
                    <textarea class="form-control" name="informacao" 
                    placeholder="Informações sobre como acessar o curso, qual plataforma..."></textarea>
                </div>
            </div>
        
        <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" class="btn btn-primary" value="cadastrar">
                    <i class="fas fa-save"></i>
                    Cadastrar</button>
        </div>
        <hr style="width: 80%;">
    </form>
</main>