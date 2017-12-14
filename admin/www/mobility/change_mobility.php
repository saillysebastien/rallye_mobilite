<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];
  $sql = sprintf("SELECT * FROM mobility WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $image = $result['image'];
  $web = $result['web'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier un moyen de transport à modifier !");
}
if ($_POST) {
  $valid = true;
  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un identifiant (id) !");
  }
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le nom de l'entreprise !");
  }
  if (isset($_POST['web']) && !empty(trim($_POST['web']))) {
    $web = $_POST['web'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le site web !");
  }
  if (isset($_POST['done'])) {
    $done = true;
  }
  if ($valid) {
    try {
      $sql = sprintf("UPDATE mobility SET id='$id2', title='$title', image='$image', web = '$web', done='$done' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($infos, "Moyen de transport $title modifié");
    }
  }
}
?>
<div class="container-fluid text-center">
  <div class="col-12">
    <legend>Modification d'un MOYEN DE TRANSPORT</legend>
    <?php
    include("../../infos.php");
    include("../../errors.php");
    ?>
    <div class="row justify-content-center">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group  text-center">
          <label class="col-12" for="id">Identifiant du moyen de transport</label>
          <input type="numeric" class="col-8 text-center" name="id" value="<?= htmlentities($id) ?>" required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="title">Titre</label>
          <input class="col-8 text-center" type="text" name="title" value="<?= htmlentities($title) ?>" required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="web">Site web</label>
          <input class="col-8 text-center" type="text" name="web" value="<?= htmlentities($web) ?>" required />
        </div>

        <div class="form-group">
          <label class="col-12" for="text">Nom de l'image</label>
          <input class="col-8 text-center" type="text" name="image2" id="text" value="<?= htmlentities($image) ?>" required />
        </div>

        <div class="form-check">
          <label class="form-check-label col-12">
            <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
            Cochez ici si vous voulez que ce moyen de transport soit affiché !
          </label>
        </div>
        <br /><button type="submit" name="update" class="btn btn-primary">Valider</button><br />
      </form>
    </div>
  </div>
</div>
<?php include('../include/footer.php');
