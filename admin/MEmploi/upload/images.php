<?php

include('../include/header.php');
require('../../../config/connect.php');

$errors = [];
$informations = [];

$sql_caroussel= $db->query("SELECT * FROM home ORDER BY id");
$sql_entreprises = $db->query("SELECT * FROM entreprises ORDER BY domain_activity");
$sql_formations = $db->query("SELECT * FROM formations ORDER BY title");
$sql_upload = $db->query("SELECT * FROM upload ORDER BY title");

 ?>

<div class="container-fluid text-center">
  <div class="row justify-content-center">
    <h1>Listes des images par lieu d'affichage</h1>

  </div>





</div>
