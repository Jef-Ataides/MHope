<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
   
    require '../config/conexao.php';
    require '../classes/Usuario.php';

    $user = new Usuario();
    

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);


   if($user->login($email, $senha) == true){
     if(isset($_SESSION['idUser'])){
        header("LOCATION: ../index.php");
     }else{
        $_SESSION['msg'] = "<p style='color: red;'> inválidos!</p>";
        header("LOCATION: ../login.php");
     }
   }else{
    $_SESSION['msg'] = "<p style='color: red;'>Email ou senha inválidos!</p>";
    header("LOCATION: ../login.php");
   }

}else{
    $_SESSION['msg'] = "<p style='color: red;'>Email ou senha inválidos!</p>";
    header("LOCATION: ../login.php");
}

?>