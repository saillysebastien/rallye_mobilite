<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM home WHERE id=%s", $_GET["id"]);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $image = $result['image'];
  $title = $result['title'];
  $text = $result['text'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier une image à supprimer !");
}
if ($_POST) {
  $valid = true;
  if (isset($_POST['id_caroussel']) && !empty(trim($_POST['id_caroussel']))) {
    $id = $_POST['id_caroussel'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer l'Identifiant (id) de l'entreprise !");
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
    array_push($infos, "Photo $title modifiée.");
  }
}
?>
<div class="container create_home text-center">
  <legend>Création pour la rubrique accueil (photos et commentaires)</legend><br />
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
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
<?php include('../include/footer.php');
