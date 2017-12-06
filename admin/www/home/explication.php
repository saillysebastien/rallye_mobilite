<?php
include('../include/header.php');
$three = '';
$four = '';
$five = '';

 ?>

<div class="container-fluid text-center">
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM explication");
    while($row = $sql->fetch_assoc()) {
      if (empty($row['text3'])) {
        $three = "style='display:none;'";
      } else {
        $three = "";
      }
      if (empty($row['text4'])) {
        $four = "style='display:none;'";
      } else {
        $four = "";
      }
      if (empty($row['text5'])) {
        $five = "style='display:none;'";
      } else {
        $five = "";
      }
      if ($row['done'] == true) {
        $done = "Actif";
      } else {
        $done = "Inactif";
      }
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="bg-dark text-white"><img src="../images/%s" class="img img-fluid" alt="logo %s" style="margin:0;"/>
      <div class="float-right small">
      <a class="btn btn-raised btn-success"  data-placement="top" title="Identifiant">Id: %d</a>
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Titre :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Texte 1 :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Texte 2 :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12" %s>
      <div class="col-4">Texte 3 :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12" %s>
      <div class="col-4">Texte 4 :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12" %s>
      <div class="col-4">Texte 5 :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Affichage :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="change_explication.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer cette explication ?&quot;);" href="delete_explication.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["title"]
      , $row["text1"]
      , $row["text2"]
      , $three
      , $row["text3"]
      , $four
      , $row["text4"]
      , $five
      , $row["text5"]
      , $done
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
  </div>
</div>
