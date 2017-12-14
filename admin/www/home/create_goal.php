<?php
include('../include/header.php');

if (isset($_POST['valider'])) {
  $valid = true;
  if (isset($_POST['text']) && !empty(trim($_POST['text']))) {
    $text = $_POST['text'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez rentrer un texte pour l'objectif !");
  }
  if (isset($_POST['done'])) {
    $done = true;
  }
  if ($valid) {
    $sql = "INSERT INTO goal (id, text, done) VALUES ('', '$text', '$done')";
    $valid_sql = mysqli_query($db, $sql);
    $infos['success'] = "<div class='alert alert-info text-center' role='alert'>L'objectif $text a été créé et les informations ont bien été inscrites dans la base de données.</div>";
  } else {
    $error['valid'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du remplissage du formulaire !!!<div>";
  }
}
?>
<div class="container-fluid text-center">
  <div class="col-12">
    <legend>Création d'un OBJECTIF pour la page d'accueil</legend>
    <?php
    include("../../infos.php");
    include("../../errors.php");
    ?>
    <div class="row justify-content-center">
      <form method="post" enctype="multipart/form-data">

        <div class="form-group text-center">
          <label class="col-12 " for="text">Texte</label>
          <input class="col-12 text-center" type="text" name="text" value="<?= htmlentities($text) ?>" required />
        </div>

        <div class="form-check">
          <label class="form-check-label col-12">
            <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
            Cochez ici si vous voulez que cet objectif soit affiché!
          </label>
        </div>
      </div>
      <br /><button type="submit" name="valider" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
</div>
<?php include('../include/footer.php');
