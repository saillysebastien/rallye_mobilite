<?php

require('../../config/db_home.php');
try {
  $db = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

include('include/header.php');
include('include/footer.php');

$sql2 = $db->query("SELECT * FROM home WHERE id = 1");
$sql = $db->query("SELECT * FROM home WHERE id != 1");

  printf("
  <div class = 'container-fluid'>
  <legend>Liste des photos qui d'affiche en page d'accueil</legend>
  <p> L'image qui apparait en premier dans le défilement des photos doit impérativement posséder l'Id 1, il est impératif de modifier celui-ci avant de mettre une autre photo à la place.
  <table class = 'table table-bordered table-striped'>
  <thead>
  <tr>
  <td class = 'col-1'> Id </td>
  <td class = 'col-3'> Image </td>
  <td class = 'col-2'> Nom de l'image</td>
  <td class = 'col-2'> Titre </td>
  <td class = 'col-1'> Affiché </td>
  <td class = 'col-1'> Date </td>
  <td class = 'col-2'> Action</td>
  </tr>
  </thead>
  <tbody>");

while ($row = $sql2->fetch_assoc()) {

  if ($row['id'] === "1") {
    $row['done'] = "Première image affichée";
  }

  printf("
  <tr>
  <td class = 'col-1'>%s</td>
  <td class = 'col-3'><img class = 'img img-fluid' src = 'images/%s'></td>
  <td class = 'col-2'>%s</td>
  <td class = 'col-1'>%s</td>
  <td class = 'col-1'>%s</td>
  <td class = 'col-1'>%s</td>
  <td class = 'col-2'><a class = 'btn btn-success' href='home/change_caroussel.php?id=%s'>Modifier</a></td>"
, $row['id']
, $row['image']
, $row['image']
, $row['title']
, $row['done']
, $row['text']
, $row['id']);
}
while ($row = $sql->fetch_assoc()) {

  if ($row['done'] === "1") {
    $row['done'] =  "Actif";
  } else {
    $row['done'] = "Inactif";
  }

  printf("
    <tr>
    <td class = 'col-1'>%s</td>
    <td class = 'col-3'><img class = 'img img-fluid' src = 'images/%s'></td>
    <td class = 'col-2'>%s</td>
    <td class = 'col-1'>%s</td>
    <td class = 'col-1'>%s</td>
    <td class = 'col-1'>%s</td>
    <td class = 'col-2'><a class='btn btn-success' href='home/change_caroussel.php?id=%s'>Modifier</a>
    <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='home/delete_caroussel.php?id=%s'>Supprimer</a></td>
    </div>"
  , $row['id']
  , $row['image']
  , $row['image']
  , $row['title']
  , $row['done']
  , $row['text']
  , $row['id']
  , $row['id']);
}
   ?>
