<?php
  include_once("adm/config/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MHope</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https: //fonts.googleapis.com/css2? family= Ms+Madi & display=swap" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color: #eccdec;">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <!--<h1><a href="index.php">MHope</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Início</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">Sobre</a></li>
          <li class="dropdown"><a href="#"><span>Fórum</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="forumCras.php">Fale com CRAS</a></li>
              <li><a href="forumSupervisionado.php">Supervisionado</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Cursos</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="cursos.php">Conheça os Cursos</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#video">Vídeos</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <?php 
            include("verificar.php");   
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
          ?>

          <li class="dropdown"><a href="#"><span>Olá, <?php echo $nomeCliente;?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="cursosMatriculados.php">Meus cursos</a></li>
              <li><a href="adm/logoutCliente.php">Sair</a></li>
            </ul>
          </li>

          <?php }else{?>
             <li><a class="nav-link scrollto" href="loginCliente.php">Faça o login</a></li>
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <?php
          $sql_contato = "SELECT * FROM contatos WHERE id='1' ";
          $sql_query = $conexao->prepare($sql_contato);
          $sql_query->execute();
      
          $row_contato = $sql_query->fetch(PDO::FETCH_ASSOC);
      ?>

      <div class="header-social-links d-flex align-items-center">
        <a href="<?php echo $row_contato['twitter'];?>" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="<?php echo $row_contato['facebook'];?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="<?php echo $row_contato['instagram'];?>" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1 style="color: black;">Bem-vindo ao <span>MHope</span></h1>
      <h2 style="color: black;">Esta precisando de ajuda, Vamos conversar.</h2>
      <a href="forumCras.php" class="btn-get-started scrollto"><i class="bi bi-chat-dots-fill"></i> Ajuda</a>
    </div>
  </section><!-- End Hero --> 

  <main id="main">

   
  </main><!-- End #main -->

 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
