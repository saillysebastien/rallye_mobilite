<?php
include('../include/header.php');

//on recupére l'id envoyé dans la barre de navigation
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  // Nous allos chercher les infos concernant le quizz
  $sql = sprintf("SELECT * FROM quizz WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $question = $result['question'];
  $index = $result['indice'];
  $response = $result['response'];
} else {
  $valid = false;
  array_push($errors, "L'identifiant du rébus doit être spécifié !");
}
if (isset($_POST['valider'])) {
  //On effectue les différentes vérifications et que certains champs ne soit pas vide lors de l'envoi du formulaire
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez spécifier un nom au quizz !");
  }
  if (isset($_POST['question']) && !empty(trim($_POST['question']))) {
    $question = $_POST['question'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la question !");
  }
  if (isset($_POST['response']) && !empty(trim($_POST['response']))) {
    $response = $_POST['response'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner la réponse !");
  }
  if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }
  // si les validations sont conformes on fait notre requête sql
  if ($valid) {
    try {
      $sql = sprintf("UPDATE quizz SET title='$title', question='$question', indice='$index', response='$response' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($infos, "Quizz $title modifié");
    }
  }
}
?>
<div class="container text-center">
  <legend class="text-center"> Modification du quizz <?= $title ?></legend>
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group text-center">
      <label class="col-12" for="title"> Nom du quizz </label>
      <input class="col-8 text-center" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="question"> Question </label>
      <input class="col-8 text-center" type="text" placeholder="obligatoire" name="question" value="<?= htmlentities($question) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="response"> Réponse </label>
      <input class="col-8 text-center" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="index"> Indice </label>
      <input class="col-8 text-center" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>
    <button type="submit" name="valider" class="btn btn-primary"> Valider </button>
  </div><!-- fin du container -->
  <?php include('../include/footer.php');?>
