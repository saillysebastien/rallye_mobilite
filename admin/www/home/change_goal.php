<?php
include('../include/header.php');

$infos =[];
$errors = [];

$text = '';
$done = false;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];
  $sql = sprintf("SELECT * FROM goal WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $text = $result['text'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier un objectif à supprimer !");
}
if ($_POST) {
  $valid = true;
  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un identifiant (id) !");
  }
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
    try {
      $sql = sprintf("UPDATE goal SET id='$id2', text='$text', done='$done' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($infos, "Objectif numéro $id modifié");
    }
  }
}
?>
<div class="container-fluid text-center">
    <div class="col-12">
      <legend>Modification d'un OBJECTIF pour la page d'accueil</legend>
      <?php
      include("../infos.php");
      include("../errors.php");
      ?>
      <div class="row justify-content-center">
      <form method="post" enctype="multipart/form-data">
          <div class="form-group text-center">
            <label class="col-12" for="id">Identifiant de l'objectif</label>
            <input type="numeric" class="col-5 text-center" name="id" value="<?= htmlentities($id) ?>" required />
          </div>

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
        <br /><button type="submit" name="update" class="btn btn-primary">Valider</button>
      </form>
    </div>
  </div>
</div>
<?php include('../include/footer.php');?>
