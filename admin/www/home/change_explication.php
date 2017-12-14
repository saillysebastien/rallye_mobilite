<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM explication WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $image = $result['image'];
  $text1 = $result['text1'];
  $text2 = $result['text2'];
  $text3 = $result['text3'];
  $text4 = $result['text4'];
  $text5 = $result['text5'];

  if (isset($_POST['upload'])) {
    if (isset($_POST['id2']) && !empty(trim($_POST['id2']))) {
      $id2 = $_POST['id2'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez indiquer l'identifiant (id) !");
    }
    if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
      $title = $_POST['title'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez donner un nom à l'explication !");
    }
    if (isset($_POST['image2']) && !empty(trim($_POST['image2']))) {
      $image = $_POST['image2'];
    } else {
      $valid = false;
      array_push($errors, "Vous ne pouvez pas enlever l'image !");
    }
    if (isset($_POST['text1']) && !empty(trim($_POST['text1']))) {
      $text1 = $_POST['text1'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez remplir le 1er texte !");
    }
    if (isset($_POST['text2']) && !empty(trim($_POST['text2']))) {
      $text2 = $_POST['text2'];
    } else {
      $valid = false;
      array_push($errors, "Vous devez donner remplir le deuxième texte !");
    }
    if (isset($_POST['text3']) && !empty(trim($_POST['text3']))) {
      $text3 = $_POST['text3'];
    } else {
      $text3 = null;
    }
    if (isset($_POST['text4']) && !empty(trim($_POST['text4']))) {
      $text4 = $_POST['text4'];
    } else {
      $text4 = null;
    }
    if (isset($_POST['text5']) && !empty(trim($_POST['text5']))) {
      $text5 = $_POST['text5'];
    } else {
      $text5= null;
    }
    if (isset($_POST['done'])) {
      $done = true;
    }
    if ($valid) {
      try {
        $sql = sprintf("UPDATE explication SET id='$id2', title='$title', image='$image', text1='$text1', text2='$text2', text3='$text3', text4='$text4', text5='$text5', done='$done' WHERE id='%s'", $_GET['id']);
        $valid_sql = mysqli_query($db, $sql);
      } catch (Exception $e) {
        header('Location: error500.html', true, 302);
        exit();
      }
      if ($valid_sql) {
        array_push($infos, "L'explication $title a été modifié.");
      }
    }
  }
}
?>
<div class="container-fluid text-center">
  <legend>Modification d'une explication pour l'accueil</legend>
  <?php
  include('../../infos.php');
  include('../../errors.php');
  ?>

  <div class="row justify-content-center">
    <form class="col-8" method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="id2">Identifiant</label>
        <input class="col-12 text-center" type="text" name="id2" value="<?= htmlentities($id) ?>" required />
      </div>
      <div class="form-group text-center">
        <label class="col-12" for="title">Titre</label>
        <input class="col-12 text-center" type="text" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text1">Texte 1</label>
        <input class="col-12 text-center" type="numeric" name="text1" value="<?= htmlentities($text1) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text2">Texte 2</label>
        <input class="col-12 text-center" type="text" name="text2" value="<?= htmlentities($text2) ?>"/>
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text3">Texte 3</label>
        <input class="col-12 text-center" type="numeric" name="text3" value="<?= htmlentities($text3) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text4">Texte 4</label>
        <input class="col-12 text-center" type="text" name="text4" value="<?= htmlentities($text4) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text5">Texte 5</label>
        <input class="col-12 text-center" type="text" name="text5" value="<?= htmlentities($text5) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text">Nom de l'image</label>
        <input class="col-12 text-center" type="text" name="image2" id="text" value="<?= htmlentities($image) ?>"  />
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
<?php include('../include/footer.php');
