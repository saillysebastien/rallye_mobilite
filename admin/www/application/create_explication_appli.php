<?php
include('../include/header.php');

$infos = [];
$errors = [];

$valid = true;
$text = '';
$done = false;

if (isset($_POST['valider'])) {
  $text = $_POST['text'];
  if(!empty($text)) {
    $text = $_POST['text'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer l'explication !");
  }
  if (isset($_POST['done'])) {
    $done = true;
  }
  if ($valid) {
    $sql = "INSERT INTO appli_explication (text, done) VALUES ('$text', '$done')";
    $valid_sql = mysqli_query($db, $sql);
    if ($valid_sql) {
      array_push($infos, "L'explication $id a bien été crée et inscrite dans la base de données.");
    }
  } else {
    array_push($errors, "Une erreur est survenue lors du remplissage du formulaire !");
  }
}
?>
<div class="container-fluid text-center">
  <legend>Création d'une explication pour l'application</legend>
  <?php
  include('../infos.php');
  include('../errors.php');
  ?>
  <div class="row justify-content-center">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="text">Texte</label>
        <input class="col-12" type="numeric" name="text" value="<?= htmlentities($text) ?>" />
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
          Cochez ici si vous voulez l'afficher
        </label>
      </div>

      <button type="submit" name="valider" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
<?php include('../include/footer.php');?>
