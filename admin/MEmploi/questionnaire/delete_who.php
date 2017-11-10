<?php

include('../include/header.php');
require('../../../config/connect.php');

$errors = [];
$informations = [];

$valid = true;
$id = null;
$image = null;
$title = '';

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez spécifier un quizz Qui est-ce? à supprimer</div>";
}

if ($valid) {
  $sql = sprintf("SELECT * FROM who WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();
  $image = $infos['image'];
  $title = $infos['title'];

  try {
    $delete = unlink ("images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM who WHERE id ='%s'", $id);
      $sql = $db->query($request);
      $informations['delete'] = "<div class='alert alert-danger' role='alert'>  L'image $image supprimée du dossier et le quizz Qui est-ce ? $title supprimée de la base de données</div>";
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }
}
?>
<div class="container-fluid text-center">

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
