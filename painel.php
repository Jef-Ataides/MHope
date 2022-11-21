<?php
    include("includes/layoutForum.php");
?>

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center" data-aos="fade-up">
      <h1 style="color: black;">Bem-vindo ao <span>MHope</span></h1>
      <h2 style="color: black;">Esta precisando de ajuda, Vamos conversar.</h2>
      <a href="forumCras.php" class="btn-get-started scrollto"><i class="bi bi-chat-dots-fill"></i> Ajuda</a>
    </div>
  </section><!-- End Hero --> 

  <main id="main">

<!-- ======= What We Do Section ======= -->
<section id="about" class="what-we-do ">
  <div class="container">

  <div class="section-title">
  <img src="assets/img/logo.png" alt=""/>
  </div>

    <div class="section-title">
      <h2 style=" font-family: Verdana, Geneva, Tahoma, sans-serif;">O que nós fazemos</h2>
      <p>Oferecemos apoio psicológica profissional de maneira discreta e gratuíta.</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="icon-box">
          <div class="icon"><i class='bx bxs-chat'></i></div>
          <h4><a href="forumCras.php">Fale com o CRAS</a></h4>
          <p>Mande mensagem para um proficional da saúde mental.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="icon-box">
          <div class="icon"><i class='bx bx-comment-dots'></i></div>
          <h4><a href="forumSupervisionado.php">Fórum</a></h4>
          <p>Mande mensagem para outras pessoas que estão procurando ajuda.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
        <div class="icon-box">
          <div class="icon"><i class='bx bxs-graduation'></i></div>
          <h4><a href="cursos.php">Cursos</a></h4>
          <p>Saiba mais sobre nossos cursos e também como se escrever.</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End What We Do Section -->

<!-- ======= Portfolio Section ======= -->
<section id="video" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Vídeos</h2>
          <p>Vídeos que possam ajudar a te fortalecer mentalmente ou ajuda-lo de outras formas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todos</li>
              <li data-filter=".Mental" >Mental</li>
              <li data-filter=".Ansiedade" >Ansiedade</li>
              <li data-filter=".Deprimido" >Deprimido</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">

        <?php
          $sql = "SELECT * FROM videos ORDER BY id ASC ";
          $sql_query = $conexao->prepare($sql);
          $sql_query->execute();
          while($rowVideo = $sql_query->fetch(PDO::FETCH_ASSOC)){ 
        ?>

          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $rowVideo['tipo'];?> wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <video width="500" src="adm/update/videos/<?php echo $rowVideo['arquivo'];?>"></video>
                <a href="adm/update/videos/<?php echo $rowVideo['arquivo'];?>"  
                class="link-preview portfolio-lightbox" title="Reproduzir"><i class="bx bx-play"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a><?php echo $rowVideo['nome'];?></a></h4>
                <p><?php echo $rowVideo['descricao'];?></p>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
   <div class="container">
     <div class="section-title">
       <h2>Jogos</h2>
       <p>Jogos online podem ser muito benéficos para a saúde mental.</p>
     </div>
     <?php
      $sql = "SELECT * FROM jogos ORDER BY id ASC ";
      $sql_query = $conexao->prepare($sql);
      $sql_query->execute();
      while($rowJogo = $sql_query->fetch(PDO::FETCH_ASSOC)){ 
     ?>
     <div class="row">
       <div class="col-md-6">
         <div class="icon-box">
           <i class="bi bi-controller"></i>
           <h4><a href="<?php echo $rowJogo['link'];?>"><?php echo $rowJogo['nome'];?></a></h4>
           <p><?php echo $rowJogo['descricao'];?></p>
         </div>
       </div>   
     </div>
     <?php }?>
      </div>
    </section><!-- End Services Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contato</h2>
        </div>

        <?php
          $sql_contato = "SELECT * FROM contatos WHERE id='1' ";
          $sql_query = $conexao->prepare($sql_contato);
          $sql_query->execute();
      
          $row_contato = $sql_query->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="row mt-5 justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Localização:</h4>
                  <p><?php echo $row_contato['endereco'];?><br><?php echo $row_contato['cidade'] . ", ".$row_contato['estado'];?></p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p><?php echo $row_contato['email'];?><br></p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-whatsapp"></i>
                  <h4>Telefone:</h4>
                  <p><?php echo $row_contato['telefone'];?></p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section><!-- End Contact Section -->
</main>

<?php
    include("includes/footer.php");
?>