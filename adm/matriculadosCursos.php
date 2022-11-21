<?php
    include("includes/layout.php");

    $sql_cursos = "SELECT * FROM cursos ORDER BY id DESC";
    $query_cursos = $conexao->prepare($sql_cursos);
    $query_cursos->execute();
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -6%; color: white;">Matrículados nos Cursos</h1>
    <hr style="width: 80%;">
    <h1>Matrículados nos Cursos</h1>

        <div style="margin-top: 4%;">
        <hr style="width: 80%;">
        <form method="GET" action="">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label>Selecione o Cuso:</label>
                    <select class="form-control" name="curso" style="margin-top: 1%;">
                        <option></option>
                        <?php
                            while($row_curso = $query_cursos->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option><?php echo $row_curso['nome']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" style="margin-top: 4%;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>    
        </div>
        
        <?php
          $curso = filter_input_array(INPUT_GET, FILTER_DEFAULT);

           $sql_c = "SELECT * FROM cursos WHERE nome = :nome";
           $query_c = $conexao->prepare($sql_c);
           $query_c->bindParam(':nome', $curso['curso']);
           $query_c->execute();
           while($row_c = $query_c->fetch(PDO::FETCH_ASSOC)){
                //echo $row_c['id'];

                $sql_matricula = "SELECT * FROM matricula_cursos WHERE 	curso_id = :curso_id";
                $query_matricula = $conexao->prepare($sql_matricula);
                $query_matricula->bindParam(':curso_id', $row_c['id']);
                $query_matricula->execute();
        ?>

        <table class="table" style="width: 80%; margin-top: 2%;">
        <thead style="background-color: #cab1cb;">
            <tr>
            <th scope="col" style="color: black;">Nome</th>
            <th scope="col" style="color: black;">Telefone</th>
            <th scope="col" style="color: black;">Email</th>
            <th scope="col" style="color: black;">Endereço</th>
            </tr>
        </thead>
        <?php
            while($row_matricula = $query_matricula->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tbody>
            <tr style="font-size: 18px; color: green; font-family: Arial, Helvetica, sans-serif;">
            <td><?php echo $row_matricula['nome'];?></th>
            <td><?php echo $row_matricula['telefone'];?></td>
            <td><?php echo $row_matricula['email'];?></td>
            <td><?php echo $row_matricula['endereco'];?></td>
            </tr>
        </tbody>
        
        <?php
             }

            }
        ?>
        <a style="color: #fff; margin-top: 1%;" href="pdf/matriculadosPDF.php?id=<?php echo $curso['curso'];?>" class="btn">
            <i class='fas fa-file-pdf' style='font-size:40px; color: red;'></i></a>
        </table>

        
</main>