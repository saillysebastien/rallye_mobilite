<?php

include('../include/header.php');
require('../../../config/connect.php');

$errors = [];
$informations = [];
$valid = true;

$id = null;
$title = '';

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez spécifier un quizz à supprimer</div>";
}

if ($valid) {
  $sql = sprintf("SELECT * FROM quizz WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();
  $title = $infos['title'];

  try {
    if ($result) {
      $request = sprintf("DELETE FROM quizz WHERE id ='%s'", $id);
      $sql = $db->query($request);
      $informations['delete'] = "<div class='alert alert-danger text-center' role='alert'>Le quizz $title supprimé de la base de données";
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
