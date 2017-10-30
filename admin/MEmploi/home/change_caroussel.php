<?php

require('../../../config/db_home.php');
include('../include/header.php');

try {
  $db = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$id = null;
$valid = true;
$errors = [];
$informations = [];
$image = null;
$text = "";
$title = "";
$done = false;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM home WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();

  $image = $infos['image'];
  $title = $infos['title'];
  $text = $infos['text'];

} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger'>Vous devez spécifier une image à modifier";
}

if ($_POST) {
  $valid = true;

  if (isset($_POST['id_caroussel']) && !empty(trim($_POST['id_caroussel']))) {
    $id = $_POST['id_caroussel'];
  } else {
    $valid = false;
    $errors['id'] = "<div class='alert alert-danger'>Vous devez remplir l\'id</div>";
  }

  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $title = null;
  }

  if (isset($_POST['text']) && !empty(trim($_POST['text']))) {
    $text = $_POST['text'];
  } else {
    $text = null;
  }

  if (isset($_POST['done'])) {
    $done = true;
  }

  if ($valid) {
    try {
      $sql = sprintf("UPDATE home SET id='$id', title='$title', text='$text', image='$image', done='$done' WHERE id='%s'", $_GET['id']);
      mysqli_query($db, $sql);

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }

    $informations['success'] = "<div class='alert alert-success center'>Photo modifiée (id : $id )</div>\n . <br /> . <a class='btn btn-success' href='home.php'>Retour à la liste</a>";
  }
}
?>

<div class="container create_home">

  <?php

  if (isset($informations['success'])) {
    echo $informations['success'];
  }

  if (isset($errors['id'])) {
    echo $errors['id'];
  }

  if (isset($errors['image'])) {
    echo $errors['image'];
  }


  ?>
  <legend>Création pour la rubrique accueil (photos et commentaires)</legend><br />
  <form  method="post" enctype="multipart/form-data" class="home">
    <div class="form-group">
      <label class="col-2" for="id_caroussel">Identifiant de la photo</label>
      <input type="numeric" class="col-6" name="id_caroussel" id="id_caroussel" value="<?= htmlentities($id) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="title">Lieu de la visite</label>
      <input type="text" placeholder="Uniquement le lieu exemple: Arvato" class="col-6" name="title" id="title" value="<?= htmlentities($title) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="text">Date de la visite</label>
      <input class="col-6" type="text" name="text" placeholder="Uniquement la date exemple: Février 2017" id="text" value="<?= htmlentities($text) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="text">Nom de l'image</label>
      <input class="col-6" type="text" name="image2" id="text" value="<?= htmlentities($image) ?>"  />
    </div>

    <div class="form-check">
      <label class="form-check-label col-9">
        <input type="checkbox" class="form-check-input col-1" name="done" value="1" <?php if ($done) { echo 'cheched'; } ?> />
        Cochez ici si vous voulez l'afficher sur la page accueil
      </label>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Valider</button>
  </form>

</div>
