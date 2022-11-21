<?php
    include("includes/layoutPage.php");
    
    $sql_cursos = "SELECT * FROM cursos ORDER BY id ASC";
    $query = $conexao->prepare($sql_cursos);
    $query->execute();
?>

<main style="margin-top: 2%;">

   
    <section id="portfolio" class="portfolio" style="background-color: #eccdec;">
      <div class="container">

        <div class="section-title">
          <h2>Cursos</h2>
          <p>Todos os cursos, matricula-se</p>
        </div>

        <?php
            while($row_curso = $query->fetch(PDO::FETCH_ASSOC)){
            
        ?>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="adm/update/img/<?php echo $row_curso['imagem'];?>" class="img-fluid"/>
                <a href="adm/update/img/<?php echo $row_curso['imagem'];?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Detalhes"><i class="bx bx-plus"></i></a>
                <a href="matricularCurso.php?id=<?php echo $row_curso['id'];?>" class="link-details" title="Matricula-se"><i class="bx bx-edit-alt"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="portfolio-details.html"><?php echo $row_curso['nome'];?></a></h4>
                <p><?php echo $row_curso['descricao'];?></p>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
     
      </div>
    </section>
</main>

<?php
    include("includes/footer.php");
?>