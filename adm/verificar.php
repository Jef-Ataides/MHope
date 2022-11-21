<?php
include_once("config/conexao.php");

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    require_once '../adm/classes/Usuario.php';

    $user = new Usuario();

    $listLogged = $user->logged($_SESSION['idUser']);

    $nomeUser = $listLogged['nome'];

}else{
    header("LOCATION: login.php");
}

?>