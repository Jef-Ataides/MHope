<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Upload de Vídeo</h1>
    <hr style="width: 80%;">
    <h1>Upload de Vídeo</h1>
    <?php
        if(isset($_SESSION['msgUploadVideo'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgUploadVideo']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgUploadVideo']);
        else: endif
    ?>

    <form action="php/uploadVideo.php" method="POST" enctype="multipart/form-data">
        <div style="margin-top: 4%;">
        <hr style="width: 80%;">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Nome do Vídeo:</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Descrição do Vídeo:</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Tipo:</label>
                    <select class="form-control" name="tipo">
                        <option>Selecione o tipo do vídeos</option>
                        <option>Ansiedade</option>
                        <option>Deprimido</option>
                        <option>Mental</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Selecione Vídeo:</label>
                    <input type="file" class="form-control" name="arquivo" accept="video/mp4"  multiple/>
                </div>
            </div>
        </div>
        
        <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnUpload" class="btn btn-primary" value="cadastrar">
                    <i class="fas fa-save"></i>
                    Cadastrar</button>
        </div>
        <hr style="width: 80%;">
    </form>
</main>