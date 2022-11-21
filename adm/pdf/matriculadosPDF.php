<?php
    include_once("../config/conexao.php");

    $html = '';

    $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

    $sql_c = "SELECT * FROM cursos WHERE nome = :nome";
    $query_c = $conexao->prepare($sql_c);
    $query_c->bindParam(':nome', $dados['id']);
    $query_c->execute();
    while($row_c = $query_c->fetch(PDO::FETCH_ASSOC)){
        $html .= "<a style='font-size: 25px; color: #0d6efd;'>Curso: " . $row_c['nome'] . "</a><br><hr>";

        $sql_matricula = "SELECT * FROM matricula_cursos WHERE 	curso_id = :curso_id";
        $query_matricula = $conexao->prepare($sql_matricula);
        $query_matricula->bindParam(':curso_id', $row_c['id']);
        $query_matricula->execute();
        while($row_matricula = $query_matricula->fetch(PDO::FETCH_ASSOC)){
            $html .= "<a style='font-size: 20px;'>Nome: " . $row_matricula['nome'] . "<br>" . "Telefone: " . $row_matricula['telefone']. "<br>" . 
           "Email: " . $row_matricula['email'] . "</a><br><hr>";
        }
    }    


    use Dompdf\Dompdf;
    require_once 'dompdf/autoload.inc.php';

    $dompdf = new Dompdf();

    $dompdf->loadHtml('
        <a style="font-size: 40px; margin-left: 25%; color: #0d6efd;">Alunos Matrículados</a> 
        <hr style="width: 100%;"/> 
        
        '. $html .'
    ');

    $dompdf->setPaper('A4');

    $dompdf->render();

    $dompdf->stream(
        "matriculados_cursos.pdf",
        array(
            "Attachment" => false
        )
    );

?>