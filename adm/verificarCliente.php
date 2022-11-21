<?php
include_once("config/conexao.php");

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    require_once 'classes/Cliente.php';

    $cliente = new Cliente();

    $listLogged = $cliente->logged($_SESSION['id']);

    $nomeCliente = $listLogged['nome'];

}else{
    header("LOCATION: ../loginCliente.php");
}

?>