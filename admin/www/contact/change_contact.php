<?php
include('../include/header.php');

$infos = [];
$errors = [];

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
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $adresse = $result['adresse'];
  $president = $result['president'];
  $director = $result['director'];
  $vice_director = $result['vice_director'];
  $phone = $result['phone'];
  $mail = $result['mail'];

} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier un contact à modifier !!!");
}
if ($_POST) {
  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    array_push($errors,"Vous devez remplir l'id !!!");
  }
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors,"Vous devez indiquer l'adresse de l'entreprise !!!");
  }
  if (isset($_POST['adresse']) && !empty(trim($_POST['adresse']))) {
    $adresse = $_POST['adresse'];
  } else {
    $valid = false;
    array_push($errors,"Vous devez indiquer l'adresse de l'organisme !!!");
  }
  if (isset($_POST['president']) && !empty(trim($_POST['president']))) {
    $president = $_POST['president'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le président de l'organisme !!!");
  }
  if (isset($_POST['director']) && !empty(trim($_POST['director']))) {
    $director = $_POST['director'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le directeur de l'organisme !!!");
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
      array_push($infos, "Le contact $title a été modifié" );
    }
  }
}
?>
<div class="container-fluid text-center">
  <div class="col-12">
    <legend>Modification d'une fiche CONTACT</legend>
    <?php
    include('../infos.php');
    include('../errors.php');
    ?>
    <div class="row justify-content-center">
      <form action="#" method="post" enctype="multipart/form-data">

        <div class="form-group text-center">
          <label class="col-12" for="id">Id</label>
          <input class="col-5 text-center" type="numeric" name="id" value="<?= htmlentities($id) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="title">Organisme</label>
          <input class="col-12 text-center" type="text" name="title" value="<?= htmlentities($title) ?>" />
        </div>


        <div class="form-group text-center">
          <label class="col-12" for="adresse">Adresse</label>
          <input class="col-12 text-center" type="text" name="adresse" value="<?= htmlentities($adresse) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="president">Président</label>
          <input class="col-12 text-center" type="text" name="president" value="<?= htmlentities($president) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="director">Directeur</label>
          <input class="col-12 text-center" type="text" name="director" value="<?= htmlentities($director) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="vice_director">Directeur adjoint</label>
          <input class="col-12 text-center" type="text" name="vice_director" value="<?= htmlentities($vice_director) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="phone">Numéro de téléphone</label>
          <input class="col-12 text-center" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace exemple: 0321587526" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="mail">Adresse mail</label>
          <input class="col-12 text-center" type="text" name="mail" value="<?= htmlentities($mail) ?>"  />
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
<?php include('../include/footer.php');?>
