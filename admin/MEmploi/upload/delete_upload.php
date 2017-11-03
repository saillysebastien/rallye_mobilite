<?php

include('../include/header.php');
require('../../../config/connect.php');

$errors = [];
$informations = [];

$id = null;
$valid = true;
$image = null;

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez spécifier une image à supprimer</div>";
}

if ($valid) {
  $sql = sprintf("SELECT * FROM upload WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos= $result->fetch_assoc();
  $image = $infos['image'];

  try {
    $delete = unlink ("../images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM upload WHERE id ='%s'", $id);
      $sql = $db->query($request);
      $informations['delete'] = "<div class='alert alert-danger text-center' role='alert'>  L'image $image supprimée du dossier et supprimée de la base de données<br/><a class='btn btn-primary' href='images.php'>Retour à la liste des images</a></div>\n";
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }
}
?>
<div class="container-fluid">

  <?php
  if (isset($informations['delete'])) {
    echo $informations['delete'];
  }

  if (isset($errors['id'])) {
    echo $errors['id'];
  }
  ?>
</div>

<?php
include('../include/footer.php');
?>
