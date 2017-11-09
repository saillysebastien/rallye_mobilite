<?php

include('../include/header.php');
require('../../../config/connect.php');

$errors = [];
$informations = [];

$sql_entreprises = $db->query("SELECT * FROM entreprises ORDER BY domain_activity");
$sql_formations = $db->query("SELECT * FROM formations ORDER BY title");
$sql_upload = $db->query("SELECT * FROM upload ORDER BY title");

?>

<div class="container-fluid text-left">
  <div class="row justify-content-center">

    <?php
    if (isset($error['connexion'])) {
      echo $error['connexion'];
    }
    ?>
    <h1 class="text-center">Listes des images par lieu d'affichage</h1><br />

    <div class="row col-11">
      <?php
      if ($sql_caroussel= $db->query("SELECT * FROM home ORDER BY id")) {
        printf("
        <table class = 'table table-bordered table-striped text-center'>
        <h2>Photos accueil et caroussel</h2>
        <thead class=''>
        <tr>
        <td class = 'col-2'> Id </td>
        <td class = 'col-1'> Image </td>
        <td class = 'col-2'> Entreprise </td>
        <td class = 'col-2'> Action </td>
        </tr>
        </thead>
        <tbody>");

        while ($row = $sql_caroussel->fetch_assoc()) {
          printf("
          <tr>
          <td class = 'col-2'>%s</td>
          <td class = 'col-1'><img class = 'img img-fluid' src = '../images/%s'></td>
          <td class = 'col-2'>%s</td>
          <td class = 'col-2'><div class = 'btn-group'><a class='btn btn-success' href='../home/change_caroussel.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='../home/delete_caroussel.php?id=%s'>Supprimer</a></div></td>
          </tr>"
          , $row['id']
          , $row['image']
          , $row['title']
          , $row['id']
          , $row['id']);
        }

        printf("
        </tbody>
        </div>
        ");
      } else {
        $error['connexion'] = "<div class='alert alert-warning text-center'>Erreur de connection à la base de donnée !!!</div>";
      }
      ?>
    </div>

    <div class="row col-11">
      <?php
      if ($sql_entreprises= $db->query("SELECT * FROM entreprises ORDER BY domain_activity")) {
        printf("
        <table class = 'table table-bordered table-striped text-center'>
        <h2>Photos sections entreprises</h2>
        <thead class=''>
        <tr>
        <td class = 'col-2'> Id </td>
        <td class = 'col-1'> Image </td>
        <td class = 'col-2'> Entreprise </td>
        <td class = 'col-2'> Domaine d'activité </td>
        <td class = 'col-2'> Action </td>
        </tr>
        </thead>
        <tbody>");

        while ($row = $sql_entreprises->fetch_assoc()) {
          printf("
          <tr>
          <td class = 'col-2'>%s</td>
          <td class = 'col-1'><img class = 'img img-fluid' style='height:60px; width:80px;' src = '../images/%s'></td>
          <td class = 'col-2'>%s</td>
          <td class = 'col-2'>%s</td>
          <td class = 'col-2'><div class = 'btn-group'><a class='btn btn-success' href='../entreprises/change_enterprises.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='../entreprises/delete_enterprises.php?id=%s'>Supprimer</a></div></td>
          </tr>"
          , $row['id']
          , $row['image']
          , $row['title']
          , $row['domain_activity']
          , $row['id']
          , $row['id']);
        }

        printf("
        </tbody>
        </div>
        ");
      } else {
        $error['connexion'] = "<div class='alert alert-warning text-center'>Erreur de connection à la base de donnée !!!</div>";
      }
      ?>
    </div>

    <div class="row col-11">
      <?php
      if ($sql_formations = $db->query("SELECT * FROM formations ORDER BY id")) {
        printf("
        <table class = 'table table-bordered table-striped text-center'>
        <h2>Photos sections formations</h2>
        <thead class=''>
        <tr>
        <td class = 'col-2'> Id </td>
        <td class = 'col-1'> Image </td>
        <td class = 'col-2'> Organisme </td>
        <td class = 'col-2'> Action </td>
        </tr>
        </thead>
        <tbody>");

        while ($row = $sql_formations->fetch_assoc()) {
          printf("
          <tr>
          <td class = 'col-2'>%s</td>
          <td class = 'col-1'><img class = 'img img-fluid' style='height:60px; width:80px;' src = '../images/%s'></td>
          <td class = 'col-2'>%s</td>
          <td class = 'col-2'><div class = 'btn-group'><a class='btn btn-success' href='../formations/change_formations.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='../formations/delete_formations.php?id=%s'>Supprimer</a></div></td>
          </tr>"
          , $row['id']
          , $row['image']
          , $row['title']
          , $row['id']
          , $row['id']);
        }

        printf("
        </tbody>
        </div>
        ");
      } else {
        $error['connexion'] = "<div class='alert alert-warning text-center'>Erreur de connection à la base de donnée !!!</div>";
      }
      ?>
    </div>

  </div>
</div>
