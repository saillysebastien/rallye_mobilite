<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$error = "";
$valid = true;

$title = "";
$question = "";
$index = "";
$response = "";

if (isset($_POST['valider'])) {
  $title = $_POST['title'];
  $question = $_POST['question'];
  $index = $_POST['index'];
  $response = $_POST['response'];

  if(!empty($title)) {
    $title = strtolower($_POST['title']);
  } else {
    $valid = false;
    $error['title'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer le nom du quizz</div>";
  }

  if(!empty($question)) {
    $question = $_POST['question'];
  } else {
    $valid = false;
    $error['question'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer la question pour le quizz</div>";
  }

  if(!empty($response)) {
    $response = strtolower($_POST['response']);
  } else {
    $valid = false;
    $error['response'] = "<div class='alert alert-danger text-center' role='alert'>Le quizz doit être composé d'une réponse</div>";
  }

  if(!empty($index)) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }

  if ($valid) {
    $sql = "INSERT INTO quizz (title, question, indice, response) VALUES ('$title', '$question', '$index', '$response')";
    $valid_sql = mysqli_query($db, $sql);

    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-info text-center' role='alert'>Le quizz $title a été créé et les informations ont bien été inscrites dans la base de données.</div>";
    }
  } else {
    $error['valid'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du remplissage du formulaire !!!<div>";
  }

}
?>
<div class="container text-center">

  <?php

  if (isset($informations['success'])) {
    echo $informations['success'];
  }

  if (isset($error['title'])) {
    echo $error['title'];
  }

  if (isset($error['question'])) {
    echo $error['question'];
  }

  if (isset($error['response'])) {
    echo $error['response'];
  }
?>

  <legend class="text-center"> Création d'un quizz </legend>

  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-2" for="title"> Nom du quizz </label>
      <input class="col-4" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="question"> Question </label>
      <input class="col-4" type="text" placeholder="obligatoire" name="question" value="<?= htmlentities($question) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="response"> Réponse </label>
      <input class="col-4" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="index"> Indice </label>
      <input class="col-4" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>

    <button type="submit" name="valider" class="btn btn-primary"> Valider </button>
  </div>
  <?php
  include('../include/footer.php');
  ?>
