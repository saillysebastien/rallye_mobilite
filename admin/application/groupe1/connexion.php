<?php
$db_host = "localhost";
$db_user= "root";
$db_password = "wlprrlqhgUyftCnY";
$db_base = "home";
try {
  $connection = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
$connection->set_charset("utf8");
?>
