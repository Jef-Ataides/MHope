<?php
    include("includes/layout.php");

    $sql_cursos = "SELECT * FROM cursos ORDER BY id ASC";
    $query = $conexao->prepare($sql_cursos);
    $query->execute();
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Lista de Curso</h1>
    <hr style="width: 80%;">

    <h1>Lista de Curso</h1>
    <hr style="width: 80%;">

    <?php
        if(isset($_SESSION['msgDeleteCurso'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgDeleteCurso']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgDeleteCurso']);
        else: endif
    ?>

    <table class="table" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">Curso</th>
                <th scope="col">Descrição</th>
                <th scope="col">img</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php
            while($row_curso = $query->fetch(PDO::FETCH_ASSOC)){
            
        ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo $row_curso['nome'];?></th>
                <td><?php echo $row_curso['descricao'];?></td>
                <td><img width="100" src="update/img/<?php echo $row_curso['imagem'];?>"/></td>
                <td style="width: 12%;">
                    <a style="color: red;" href="php/excluirCurso.php?id=<?php echo $row_curso['id'];?>"  class="btn"><i class="fas fa-trash-alt"></i>Excluir</a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    <hr style="width: 80%;">
</main>