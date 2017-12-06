<?php
include('../include/header.php');

$infos = [];
$errors = [];

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
      $infos['success'] = "<div class='alert alert-info text-center' role='alert'>Le quizz $title a été créé et les informations ont bien été inscrites dans la base de données.</div>";
    }
  } else {
    $error['valid'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du remplissage du formulaire !!!<div>";
  }
}
?>
<div class="container text-center">
  <div class="row justify-content-center">
    <legend class="text-center"> Création d'un QUIZZ </legend>
    <?php
    include("../errors.php");
    include("../infos.php");
    ?>
    <form class="col-8" action="#" method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="title"> Nom du quizz </label>
        <input class="col-8" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="question"> Question </label>
        <input class="col-8" type="text" placeholder="obligatoire" name="question" value="<?= htmlentities($question) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="response"> Réponse </label>
        <input class="col-8" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="index"> Indice </label>
        <input class="col-8" type="text" name="index" value="<?= htmlentities($index) ?>" />
      </div>
      <button type="submit" name="valider" class="btn btn-primary"> Valider </button>
    </div>
  </div>
</div>
<?php include('../include/footer.php');?>
