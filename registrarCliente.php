<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MHope - Registrar</title>

    <!-- Custom fonts for this template-->
    <link href="adm/views/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="adm/views/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #eccdec;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="card" style="width: 80%; margin-top: 8%; border-radius: 10px;">
                <div class="card-body">
                    <h1>Registrar</h1>
                    <hr/>
                    <?php
                        if(isset($_SESSION['msgResgistrar'])): 
                    ?>
                        <div class="alert alert-info" role="alert" style="width: 50%;">
                            <?php echo $_SESSION['msgResgistrar']; ?>
                        </div> 
                    <?php 
                            unset($_SESSION['msgResgistrar']);
                        else: endif
                    ?>
                    <form method="POST" action="adm/php/registrarCliente.php">
                        <div class="row g-3" style="margin: 0;">
                            <div class="col-md-8">
                                <label class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome"/>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control" name="dataNascimento"/>
                            </div>

                        </div>

                        <div class="row g-3" style="margin: 0; margin-top: 2%;">

                            <div class="col-md-4">
                                <label class="form-label">Telefone:</label>
                                <input type="tel" class="form-control" name="telefone"/>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email"/>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Senha:</label>
                                <input type="password" class="form-control" name="senha"/>
                            </div>
                        </div>

                        <div class="row g-3" style="margin: 0; margin-top: 2%;">

                            <div class="col-md-12">
                                <label class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="endereco"/>
                            </div>
                        </div>

                        <div class="row g-3" style="margin: 0; margin-top: 2%;">

                            <div class="col-md-2">
                                <button type="submit" name="btnRegistrar" value="registrar"
                                class="btn btn-info btn-user btn-block">Registrar</button>
                            </div>
                        </div>
                    </form>
                    <hr/>
                    <a style="margin-left: 5%;" href="loginCliente.php">Já se registrou? Agora clique aqui para fazer o login.</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="adm/views/vendor/jquery/jquery.min.js"></script>
    <script src="adm/views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="adm/views/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="adm/views/js/sb-admin-2.min.js"></script>

</body>

</html>