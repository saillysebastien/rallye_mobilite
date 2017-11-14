<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$errors = "";
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

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM rebus WHERE id =%s", $_GET['id']);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();

  $title = $infos['name'];
  $one = $infos['one'];
  $two = $infos['two'];
  $three = $infos['three'];
  $four = $infos['four'];
  $five = $infos['five'];
  $index = $infos['indice'];
  $response = $infos['response'];
  $my_all = $infos['my_all'];

} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger' role='alert'>L'identifiant du rébus à modifier doit être spécifié !!!";
}

if (isset($_POST['valider'])) {
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $errors['title'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner un nom au rébus !!!</div>";
  }

  if (isset($_POST['one']) && !empty(trim($_POST['one']))) {
    $one = $_POST['one'];
  } else {
    $valid = false;
    $errors['one'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner au moins 2 indices !!!</div>";
  }

  if (isset($_POST['two']) && !empty(trim($_POST['two']))) {
    $two = $_POST['two'];
  } else {
    $valid = false;
    $errors['two'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner au moins 2 indices !!!</div>";
  }

  if (isset($_POST['my_all']) && !empty(trim($_POST['my_all']))) {
    $my_all = $_POST['my_all'];
  } else {
    $valid = false;
    $errors['my_all'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner ce qu'est le tout pour le rébus !!!</div>";
  }

  if (isset($_POST['response']) && !empty(trim($_POST['response']))) {
    $response = $_POST['response'];
  } else {
    $valid = false;
    $errors['response'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner au moins indiquer une réponse !!!</div>";
  }

  if (isset($_POST['three']) && !empty(trim($_POST['three']))) {
    $three = $_POST['three'];
  } else {
    $three = null;
  }

  if (isset($_POST['four']) && !empty(trim($_POST['four']))) {
    $four = $_POST['four'];
  } else {
    $four = null;
  }

  if (isset($_POST['five']) && !empty(trim($_POST['five']))) {
    $five = $_POST['five'];
  } else {
    $five = null;
  }

  if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }

  if ($valid) {
    try {
      $sql = sprintf("UPDATE rebus SET name='$title', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-dark text-center' role='alert'>Rébus $title modifié";
    }
  }
}
?>
<div class="container text-center">

<?php
if (isset($informations['success'])) {
  echo $informations['success'];
}

if (isset($errors['id'])) {
  echo $errors['id'];
}

if (isset($errors['title'])) {
  echo $errors['title'];
}

if (isset($errors['one'])) {
  echo $errors['one'];
}

if (isset($errors['two'])) {
  echo $errors['two'];
}

if (isset($errors['my_all'])) {
  echo $errors['my_all'];
}

if (isset($errors['response'])) {
  echo $errors['response'];
}
 ?>
<legend class="text-center"> Modification du rébus <?= $title ?> </legend>

<form action="#" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label class="col-2" for="title"> Nom du rébus</label>
    <input class="col-8" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
  </div>

  <div class="form-group">
    <label class="col-2" for="one"> Question 1 </label>
    <input class="col-8" type="text" placeholder="obligatoire" name="one" value="<?= htmlentities($one) ?>" required />
  </div>

  <div class="form-group">
    <label class="col-2" for="two"> Question 2 </label>
    <input class="col-8" type="text" placeholder="obligatoire" name="two" value="<?= htmlentities($two) ?>" required />
  </div>

  <div class="form-group">
    <label class="col-2" for="three"> Question 3 </label>
    <input class="col-8" type="text" name="three" value="<?= htmlentities($three) ?>" />
  </div>

  <div class="form-group">
    <label class="col-2" for="four"> Question 4 </label>
    <input class="col-8" type="text" name="four" value="<?= htmlentities($four) ?>" />
  </div>

  <div class="form-group">
    <label class="col-2" for="five"> Question 5 </label>
    <input class="col-8" type="text" name="five" value="<?= htmlentities($five) ?>" />
  </div>

  <div class="form-group">
    <label class="col-2" for="index"> Indice </label>
    <input class="col-8" type="text" name="index" value="<?= htmlentities($index) ?>" />
  </div>

  <div class="form-group">
    <label class="col-2" for="my_all"> Mon tout est ...</label>
    <input class="col-8" type="text" placeholder="obligatoire" name="my_all" value="<?= htmlentities($my_all) ?>" />
  </div>

  <div class="form-group">
    <label class="col-2" for="response">Réponse</label>
    <input class="col-8" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
  </div>

  <button type="submit" name="valider" class="btn btn-primary">Valider</button>
</div>
<?php
include('../include/footer.php');
?>
