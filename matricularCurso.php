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
            <h2>Matricular no Curso</h2>
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
        <form action="adm/php/matricularCurso.php" method="POST">
            <div style="margin-left: 4%; margin-bottom: 8%;">
            <div class="row g-3" style="margin: 0;">
                    <div class="col-md-4">
                        <label class="form-label">Curso:</label>
                        <input type="hidden" class="form-control" name="curso" readonly
                        value="<?php echo $row_curso['nome'];?>"/>
                        <a style="font-size: 20px;"><?php echo $row_curso['nome'];?></a>
                    </div>

                    <input type="hidden" class="form-control" name="curso_id"
                        value="<?php echo $row_curso['id'];?>"/>
            </div>
            <hr style="width: 85%;">
                <div class="row g-3" style="margin: 0;">
                    <div class="col-md-4">
                        <label class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="nome"/>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="dataNascimento"/>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email"/>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Telefone:</label>
                        <input type="tel" class="form-control" name="telefone"/>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Endereço:</label>
                        <input type="text" class="form-control" name="endereco"/>
                    </div>
                </div>
                <hr style="width: 85%;">
                <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnCursoMatricula" class="btn btn-primary" 
                value="cadastrar">Matricular</button>
            </div>
            </div>
        </form>
    </div>
    </div>
</main>

<?php
    include("includes/footer.php");
?>