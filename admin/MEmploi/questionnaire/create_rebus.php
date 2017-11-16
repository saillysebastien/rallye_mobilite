<?php
include('../include/header.php');

$informations = [];
$error = "";
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

if (isset($_POST['valider'])) {
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
    $error['title'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer le nom du rébus</div>";
  }
  if(!empty($one)) {
    $one = $_POST['one'];
  } else {
    $valid = false;
    $error['one'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer au moins 2 éléments dans un rébus !!!</div>";
  }
  if(!empty($two)) {
    $two = $_POST['two'];
  } else {
    $valid = false;
    $error['two'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer au moins 2 éléments dans un rébus !!!</div>";
  }
  if(!empty($my_all)) {
    $my_all = $_POST['my_all'];
  } else {
    $valid = false;
    $error['my_all'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer ce qu'est mon tout !!!</div>";
  }
  if(!empty($response)) {
    $response = strtolower($_POST['response']);
  } else {
    $valid = false;
    $error['response'] = "<div class='alert alert-danger text-center' role='alert'>Le rébus doit être composé d'une réponse !!!</div>";
  }
  if(!empty($three)) {
    $three = $_POST['three'];
  } else {
    $three = null;
  }
  if(!empty($four)) {
    $four = $_POST['four'];
  } else {
    $four = null;
  }
  if(!empty($five)) {
    $five = $_POST['five'];
  } else {
    $five = null;
  }
  if(!empty($index)) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }
  if ($valid) {
    $sql = "INSERT INTO rebus (name, one, two, three, four, five, indice, my_all, response) VALUES ('$title', '$one', '$two', '$three', '$four', '$five', '$index', '$my_all', '$response')";
    $valid_sql = mysqli_query($db, $sql);
    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-info text-center' role='alert'>Le rébus $title est créé et les informations ont bien été inscrites dans la base de données.</div>";
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
  if (isset($error['one'])) {
    echo $error['one'];
  }
  if (isset($error['two'])) {
    echo $error['two'];
  }
  if (isset($error['my_all'])) {
    echo $error['my_all'];
  }
  if (isset($error['response'])) {
    echo $error['response'];
  }
  ?>
  <h1 class="text-center"> Création d'un rébus </h1>
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-2" for="title"> Nom du rébus</label>
      <input class="col-4" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="one"> Question 1 </label>
      <input class="col-4" type="text" placeholder="obligatoire" name="one" value="<?= htmlentities($one) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="two"> Question 2 </label>
      <input class="col-4" type="text" placeholder="obligatoire" name="two" value="<?= htmlentities($two) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="three"> Question 3 </label>
      <input class="col-4" type="text" name="three" value="<?= htmlentities($three) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="four"> Question 4 </label>
      <input class="col-4" type="text" name="four" value="<?= htmlentities($four) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="five"> Question 5 </label>
      <input class="col-4" type="text" name="five" value="<?= htmlentities($five) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="index"> Indice </label>
      <input class="col-4" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="my_all"> Mon tout est ...</label>
      <input class="col-4" type="text" placeholder="obligatoire" name="my_all" value="<?= htmlentities($my_all) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="response">Réponse</label>
      <input class="col-4" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
    </div>
    <button type="submit" name="valider" class="btn btn-primary">Valider</button>
  </div>
  <?php include('../include/footer.php');?>
