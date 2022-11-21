<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
   
    require '../config/conexao.php';
    require '../classes/Cliente.php';

    $cliente = new Cliente();
    

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);


   if($cliente->login($email, $senha) == true){
     if(isset($_SESSION['id'])){
        header("LOCATION: ../../painel.php");
     }else{
        $_SESSION['msgCliente'] = "<p style='color: red;'>Email ou senha inválidos!</p>";
        header("LOCATION: ../../loginCliente.php");
     }
   }else{
    $_SESSION['msgCliente'] = "<p style='color: red;'>Email ou senha inválidos!</p>";
    header("LOCATION: ../../loginCliente.php");
   }

}else{
    $_SESSION['msgCliente'] = "<p style='color: red;'>Email ou senha inválidos!</p>";
    header("LOCATION: ../../loginCliente.php");
}

?>