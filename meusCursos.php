<?php
    //session_start();
    include("includes/layoutPage.php");
    include_once("adm/config/conexao.php");

    if(isset($_GET['id'])){
        $id = strip_tags($_GET['id']);
    }else{
        $id = null;
    }

    $sql_cursos = "SELECT * FROM cursos WHERE id = :id";
    $query = $conexao->prepare($sql_cursos);
    $query->bindParam(':id', $id);
    $query->execute();
    $row_curso = $query->fetch(PDO::FETCH_ASSOC);
?>

<main style="margin-top: 4%; background-color: white;">

    <section>
        <div class="container">

            <div class="section-title">
            <h2>Informações sobre o Curso</h2>
            </div>
        </div>
    </section>

    <div style="margin-top: -6%;">
    <div class="card-body">
    <?php
        if(isset($_SESSION['msgMatricula'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgMatricula']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgMatricula']);
        else: endif
    ?>
        <div style="margin-left: 4%; margin-bottom: 8%;">
        <div class="row g-3" style="margin: 0;">
            <div class="col-md-2">
                <label class="form-label">Curso:</label>
                <a style="font-size: 20px;"><?php echo $row_curso['nome'];?></a>
            </div>
            <div class="col-md-8">
                <label class="form-label">Descrição:</label>
                <a style="font-size: 20px;"><?php echo $row_curso['descricao'];?></a>
            </div> 
        </div>

        <div class="row g-3" style="margin: 0;">
            <div class="col-md-12">
                <label class="form-label">Informações:</label>
                <a style="font-size: 20px;"><?php echo $row_curso['informacao'];?></a>
            </div> 
        </div>
        <hr style="width: 100%;"><br><br>
        </div>
       
    </div>
    </div>
</main>

<?php
    include("includes/footer.php");
?>