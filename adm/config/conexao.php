<?php
session_start();
define('HOST', '127.0.0.1');
define('DB', 'mhope_bd');
define('USUARIO', 'root');
define('SENHA', '');

global $conexao;

try{
    $conexao = new PDO('mysql:host=' . HOST . ';dbname=' . DB . ';', USUARIO, SENHA);
    //echo "Conexão com banco de dados ok!";
}catch(PDOException $erro){
    echo "Erro na conexão com banco de dados!",  $erro->getMessage();
}

?>