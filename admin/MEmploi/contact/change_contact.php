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

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM contact WHERE id =%s", $_GET['id']);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();

  $title = $infos['title'];
  $adresse = $infos['adresse'];
  $president = $infos['president'];
  $director = $infos['director'];
  $vice_director = $infos['vice_director'];
  $phone = $infos['phone'];
  $mail = $infos['mail'];

} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez spécifier un contact à modifier !!!";
}

if ($_POST) {

  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    $errors['id_post'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez remplir l'id !!!</div>";
  }

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $error['title'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer l'adresse de l'entreprise !!!</div>";
  }

  if (isset($_POST['adresse']) && !empty(trim($_POST['adresse']))) {
    $adresse = $_POST['adresse'];
  } else {
    $valid = false;
    $error['adresse'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer l'adresse de l'organisme !!!</div>";
  }

  if (isset($_POST['president']) && !empty(trim($_POST['president']))) {
    $president = $_POST['president'];
  } else {
    $valid = false;
    $error['president'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer le président de l'organisme !!!</div>";
  }

  if (isset($_POST['director']) && !empty(trim($_POST['director']))) {
    $president = $_POST['director'];
  } else {
    $valid = false;
    $error['director'] = "<div class='alert alert-danger text-center' role='alert'>Vous devez indiquer le directeur de l'organisme !!!</div>";
  }

  if (isset($_POST['vice_director']) && !empty(trim($_POST['vice_director']))) {
    $vice_director = $_POST['vice_director'];
  } else {
    $vice_director = "N/C";
  }

  if (isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
    $phone = $_POST['phone'];
  } else {
    $phone = "N/C";
  }

  if (isset($_POST['mail']) && !empty(trim($_POST['mail']))) {
    $mail = $_POST['mail'];
  } else {
    $mail = "N/C";
  }

  if (isset($_POST['done'])) {
    $done = true;
  }

  if ($valid) {
    try {
      $sql = sprintf("UPDATE contact SET id='$id2', title='$title', president='$president', adresse='$adresse', director='$director', vice_director='$vice_director', phone='$phone', mail='$mail', done='$done' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-success text-center' role='alert'>Contact $title modifié<br /><a class='btn btn-success' href='contact.php'>Retour à la liste des contacts</a></div>";
    }
  }
}
?>

<div class="container-fluid text-center">
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

  if (isset($errors['adresse'])) {
    echo $errors['adresse'];
  }

  if (isset($errors['president'])) {
    echo $errors['president'];
  }

  if (isset($errors['director'])) {
    echo $errors['director'];
  }
  ?>
  <div class="row justify-content-center">
    <div class="col-12">
      <legend>Modification d'une fiche CONTACT</legend>
      <form action="#" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label class="col-2" for="id">Id</label>
          <input class="col-4" type="numeric" name="id" value="<?= htmlentities($id) ?>" required />
        </div>

        <div class="form-group">
          <label class="col-2" for="title">Organisme</label>
          <input class="col-4" type="text" name="title" value="<?= htmlentities($title) ?>" required />
        </div>


        <div class="form-group">
          <label class="col-2" for="adresse">Adresse</label>
          <input class="col-4" type="text" name="adresse" value="<?= htmlentities($adresse) ?>" required />
        </div>

        <div class="form-group">
          <label class="col-2" for="president">Président</label>
          <input class="col-4" type="text" name="president" value="<?= htmlentities($president) ?>" required />
        </div>

        <div class="form-group">
          <label class="col-2" for="director">Directeur</label>
          <input class="col-4" type="text" name="director" value="<?= htmlentities($director) ?>" required />
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
  </div>
</div>
<?php
include('../include/footer.php');
?>
