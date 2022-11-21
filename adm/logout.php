<?php
  session_start();
  unset($_SESSION['idUser']);
  header("LOCATION: login.php");
?>