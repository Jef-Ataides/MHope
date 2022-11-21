<?php
    include("includes/layoutPage.php");
    
    $sql_cursos = "SELECT * FROM matricula_cursos WHERE nome = :nome";
    $query = $conexao->prepare($sql_cursos);
    $query->bindParam(':nome', $nomeCliente);
    $query->execute();
?>

<main style="margin-top: 2%;">

   
    <section id="portfolio" class="portfolio" style="background-color: #eccdec;">
      <div class="container">

        <div class="section-title">
          <h2>Meus Cursos</h2>
          <p>Todos os cursos que estou matriculado</p>
        </div>

        <?php
          while($row_curso = $query->fetch(PDO::FETCH_ASSOC)){
            $curso = $row_curso['id'];
        
            $sql = "SELECT * FROM cursos WHERE id = :id";
            $queryC = $conexao->prepare($sql);
            $queryC->bindParam(':id', $curso);
            $queryC->execute();

            while($row = $queryC->fetch(PDO::FETCH_ASSOC)){    
        ?>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="adm/update/img/<?php echo $row['imagem'];?>" class="img-fluid"/>
                <a href="adm/update/img/<?php echo $row['imagem'];?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Detalhes"><i class="bx bx-plus"></i></a>
                <a href="meusCursos.php?id=<?php echo $row['id'];?>" class="link-details" title="Informações"><i class="bx bx-info-circle"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="portfolio-details.html"><?php echo $row['nome'];?></a></h4>
                <p><?php echo $row['descricao'];?></p>
              </div>
            </div>
          </div>
          <?php } }?>
        </div>
     
      </div>
    </section>
</main>

<?php
    include("includes/footer.php");
?>