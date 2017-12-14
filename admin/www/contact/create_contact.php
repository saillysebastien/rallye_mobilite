<?php
include('../include/header.php');

if (isset($_POST['valider'])) {
  $title = $_POST['title'];
  $adresse = $_POST['adresse'];
  $president = $_POST['president'];
  $director = $_POST['director'];
  $vice_director = $_POST['vice_director'];
  $phone = $_POST['phone'];
  $mail = $_POST['mail'];

  if(!empty($title) && $title !== "N/C") {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors,  "Vous devez indiquer le nom de l'organisme !");
  }
  if(!empty($adresse) && $adresse !== "N/C") {
    $adresse = $_POST['adresse'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer l'adresse de l'organisme !");
  }
  if(!empty($president) && $president !== "N/C") {
    $president = $_POST['president'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le président !");
  }
  if(!empty($director) && $director !== "N/C") {
    $director = $_POST['director'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le directeur !");
  }

  if(!empty($vice_director) && $vice_director !== "N/C") {
    $vice_director = $_POST['vice_director'];
  } else {
    $vice_director = "N/C";
  }

  if(!empty($phone) && $phone !== "N/C") {
    $phone = $_POST['phone'];
  } else {
    $phone = "N/C";
  }

  if(!empty($mail) && $mail !== "N/C") {
    $mail = $_POST['mail'];
  } else {
    $mail = "N/C";
  }

  if (isset($_POST['done'])) {
    $done = true;
  }

  if ($valid) {
    $sql = "INSERT INTO contact (title, adresse, president, director, vice_director, phone, mail, done) VALUES ('$title', '$adresse', '$president', '$director', '$vice_director', '$phone', '$mail', '$done')";
    $valid_sql = mysqli_query($db, $sql);

    if ($valid_sql) {
      array_push($infos, "Le contact $title a été créé et inscrit dans la base de données.");
    }
  } else {
    array_push($errors, "Une erreur est survenue lors du remplissage du formulaire.");
  }
}
?>
<div class="container-fluid text-center">
  <legend>Création d'une fiche contact</legend>
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
  <div class="row justify-content-center">
    <form action="#" method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="title">Organisme</label>
        <input class="col-8" type="text" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="adresse">Adresse</label>
        <input class="col-8" type="text" name="adresse" value="<?= htmlentities($adresse) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="president">Président</label>
        <input class="col-8" type="text" name="president" value="<?= htmlentities($president) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="director">Directeur</label>
        <input class="col-8" type="text" name="director" value="<?= htmlentities($director) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="vice_director">Directeur adjoint</label>
        <input class="col-8" type="text" name="vice_director" value="<?= htmlentities($vice_director) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="phone">Numéro de téléphone</label>
        <input class="col-8" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace 0321587526" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="mail">Adresse mail</label>
        <input class="col-8" type="text" name="mail" value="<?= htmlentities($mail) ?>"  />
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
<?php include('../include/footer.php');?>
