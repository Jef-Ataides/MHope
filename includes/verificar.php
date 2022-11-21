<?php
include_once("adm/config/conexao.php");

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    require_once 'adm/classes/Cliente.php';

    $cliente = new Cliente();

    $listLogged = $cliente->logged($_SESSION['id']);

    $nomeCliente = $listLogged['nome'];

}
?>