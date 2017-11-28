<?php
include('../include/header.php');
require('../config/connect.php');

$infos = [];
$errors = [];
$valid = true;
$title = "";
$one = "";
$two = "";
$three = "";
$four = "";
$five = "";
$index = "";
$response = "";
$my_all = "";

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $one = $_POST['one'];
  $two = $_POST['two'];
  $three = $_POST['three'];
  $four = $_POST['four'];
  $five = $_POST['five'];
  $index = $_POST['index'];
  $my_all = $_POST['my_all'];
  $response = $_POST['response'];
  if(!empty($title)) {
    $title = strtolower($_POST['title']);
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le nom du rébus !");
  }
  if(!empty($one)) {
    $one = $_POST['one'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer au moins 2 indices dans le rébus !");
  }
  if(!empty($two)) {
    $two = $_POST['two'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer au moins 2 indices dans le rébus !");
  }
  if(!empty($my_all)) {
    $my_all = $_POST['my_all'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer ce Qu'est le tout !");
  }
  if(!empty($response)) {
    $response = strtolower($_POST['response']);
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la réponse du rébus !");
  }

  if ($valid) {
    $sql = "INSERT INTO rebus (id, name, one, two, three, four, five, indice, my_all, response) VALUES ('', '$title', '$one', '$two', '$three', '$four', '$five', '$index', '$my_all', '$response')";
    $valid_sql = mysqli_query($db, $sql);
    if ($valid_sql) {
      array_push($infos, "Le rébus $title est créé et les informations ont été inscrites dans la base de données.");
    }

  } else {
    array_push($errors, "Une erreur est survenue lors du remplissage du formulaire !");
  }
}
?>
<div class="container text-center">
  <?php
  include("../include/infos.php");
  include("../include/errors.php");
  ?>
  <legend class="text-center"> Création d'un rébus </legend>
  <form class="col-8" action="create_rebus.php" method="post" enctype="multipart/form-data">

    <div class="form-group text-center">
      <label class="col-12" for="title"> Nom du rébus</label>
      <input class="col-8" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="one"> Question 1 </label>
      <input class="col-8" type="text" placeholder="obligatoire" name="one" value="<?= htmlentities($one) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="two"> Question 2 </label>
      <input class="col-8" type="text" placeholder="obligatoire" name="two" value="<?= htmlentities($two) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="three"> Question 3 </label>
      <input class="col-8" type="text" name="three" value="<?= htmlentities($three) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="four"> Question 4 </label>
      <input class="col-8" type="text" name="four" value="<?= htmlentities($four) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="five"> Question 5 </label>
      <input class="col-8" type="text" name="five" value="<?= htmlentities($five) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="index"> Indice </label>
      <input class="col-8" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="my_all"> Mon tout est ...</label>
      <input class="col-8" type="text" placeholder="obligatoire" name="my_all" value="<?= htmlentities($my_all) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="response">Réponse</label>
      <input class="col-8" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" />
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Valider</button>
  </div>
  <?php include('../include/footer.php');?>
