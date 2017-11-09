<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$error = [];
$valid = true;

$title = '';
$adresse = '';
$president = '';
$director = '';
$vice_director = '';
$phone = null;
$mail = '';
$done = false;

if (isset($_POST['valider'])) {
  $title = $_POST['title'];
  $adresse = $_POST['adresse'];
  $president = $_POST['president'];
  $director = $_POST['director'];
  $vice_director = $_POST['vice_director'];
  $phone = $_POST['phone'];
  $mail = $_POST['mail'];

  if(!empty($title) && $title !== "N/C") {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $error['title'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer le nom de l'organisme</div>";
  }

  if(!empty($adresse) && $adresse !== "N/C") {
    $adresse = $_POST['adresse'];
  } else {
    $valid = false;
    $error['adresse'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer l'adresse de l'organisme</div>";
  }

  if(!empty($president) && $president !== "N/C") {
    $president = $_POST['president'];
  } else {
    $valid = false;
    $error['president'] = "<div class='alert alert-danger text-center' role='alert'>Vous avez oublier d'indiquer le président de l'organisme</div>";
  }

  if(!empty($director) && $director !== "N/C") {
    $director = $_POST['director'];
  } else {
    $valid = false;
    $error['director'] = "<div class='alert alert-danger text-center' role='alert'>Vous avez oublier d'indiquer le directeur de l'organisme</div>";
  }

  if(!empty($vice_director) && $vice_director !== "N/C") {
    $vice_director = $_POST['vice_director'];
  } else {
    $vice_director = "N/C";
  }

  if(!empty($phone) && $phone !== "N/C") {
    $phone = $_POST['phone'];
  } else {
    $phone = "N/C";
  }

  if(!empty($mail) && $mail !== "N/C") {
    $mail = $_POST['mail'];
  } else {
    $mail = "N/C";
  }

  if (isset($_POST['done'])) {
    $done = true;
  }

  if ($valid) {
    $sql = "INSERT INTO contact (title, adresse, president, director, vice_director, phone, mail, done) VALUES ('$title', '$adresse', '$president', '$director', '$vice_director', '$phone', '$mail', '$done')";
    $valid_sql = mysqli_query($db, $sql);

    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-info text-center' role='alert'>Vos informations ont bien été inscrites dans la base de donnée.</div>
      <div class='text-center'>
      <a class='btn btn-success' href='contact.php'>Retour à la liste des contacts</a>
      <a class='btn btn-info' href='create_contact.php'>Créer une autre contact</a></div>";
    }
  } else {
    $error['valid'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du remplissage du formulaire !!!<div>";
  }
}
?>

<div class="container-fluid text-center">

  <?php

  if (isset($informations['success'])) {
    echo $informations['success'];
  }

  if (isset($error['title'])) {
    echo $error['title'];
  }

  if (isset($error['adresse'])) {
    echo $error['adresse'];
  }

  if (isset($error['president'])) {
    echo $error['president'];
  }

  if (isset($error['director'])) {
    echo $error['director'];
  }

  ?>
  <legend>Création d'une fiche contact</legend>

  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-2" for="title">Organisme</label>
      <input class="col-4" type="text" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="adresse">Adresse</label>
      <input class="col-4" type="text" name="adresse" value="<?= htmlentities($adresse) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="president">Président</label>
      <input class="col-4" type="text" name="president" value="<?= htmlentities($president) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="director">Directeur</label>
      <input class="col-4" type="text" name="director" value="<?= htmlentities($director) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="vice_director">Directeur adjoint</label>
      <input class="col-4" type="text" name="vice_director" value="<?= htmlentities($vice_director) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="phone">Numéro de téléphone</label>
      <input class="col-4" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace exemple: 0321587526" />
    </div>

    <div class="form-group">
      <label class="col-2" for="mail">Adresse mail</label>
      <input class="col-4" type="text" name="mail" value="<?= htmlentities($mail) ?>"  />
    </div>

    <div class="form-check">
      <label class="form-check-label col-12">
        <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
        Cochez ici si vous voulez l'afficher sur la page contact
      </label>
    </div>

    <button type="submit" name="valider" class="btn btn-primary">Valider</button>

  </form>
</div>

<?php
include('../include/footer.php');
?>
