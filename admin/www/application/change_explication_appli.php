<?php
include('../include/header.php');

$infos = [];
$errors = [];

$valid = true;
$text = '';
$done = false;

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM appli_explication WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $text = $result['text'];

  if (isset($_POST['upload'])) {
    if (isset($_POST['id2']) && !empty(trim($_POST['id2']))) {
      $id2 = $_POST['id2'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez indiquer l'identifiant (id) !");
    }
    if (isset($_POST['text']) && !empty(trim($_POST['text']))) {
      $text = $_POST['text'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez remplir le texte !");
    }
    if (isset($_POST['done'])) {
      $done = true;
    }
    if ($valid) {
      try {
        $sql = sprintf("UPDATE appli_explication SET id='$id2', text='$text', done='$done' WHERE id='%s'", $_GET['id']);
        $valid_sql = mysqli_query($db, $sql);
      } catch (Exception $e) {
        header('Location: error500.html', true, 302);
        exit();
      }
      if ($valid_sql) {
        array_push($infos, "L'explication $id a été modifié.");
      }
    }
  }
}
?>
<div class="container-fluid text-center">
  <legend>Modification d'une explication pour l'application</legend>
  <?php
  include('../infos.php');
  include('../errors.php');
  ?>

  <div class="row justify-content-center">
    <form class="col-8" method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="id2">Identifiant</label>
        <input class="col-12 text-center" type="text" name="id2" value="<?= htmlentities($id) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text">Texte </label>
        <input class="col-12 text-center" type="numeric" name="text" value="<?= htmlentities($text) ?>" />
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
          Cochez ici si vous voulez l'afficher
        </label>
      </div>

      <div class="form-group">
        <button type="submit" name="upload" class="btn btn-primary">Valider</button>
      </div>
    </form>
  </div>
</div>
<?php include('../include/footer.php');?>
