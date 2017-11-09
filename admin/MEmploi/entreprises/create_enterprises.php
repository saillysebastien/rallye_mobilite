<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$error = [];
$valid = true;

$title = '';
$number_street = null;
$street = '';
$postal_code = null;
$city = '';
$activity = '';
$domain_activity = '';
$contact = '';
$phone = null;
$mail = '';
$web = '';
$done = false;

if (isset($_POST['upload'])) {
  $image = $_FILES['image'];
  $imageName = $_FILES['image']['name'];
  $imageTmpName = $_FILES['image']['tmp_name'];
  $imageSize = $_FILES['image']['size'];
  $imageError = $_FILES['image']['error'];
  $imageType = $_FILES['image']['type'];

  $imageExt = explode('.', $imageName);
  $imageActualExt = strtolower(end($imageExt));

  $allowed = ['jpg', 'jpeg', 'png', 'gif', 'svg'];

  if (in_array($imageActualExt, $allowed)) {
    if ($imageError === 0) {

      if ($imageSize < 1000000) {
        $imageDestination = '../images/' . $imageName;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);

        if ($uploadSuccess) {
          $title = $_POST['title'];
          $number_street = $_POST['number_street'];
          $street = $_POST['street'];
          $postal_code = $_POST['postal_code'];
          $city = $_POST['city'];
          $activity = $_POST['activity'];
          $domain_activity = strtolower($_POST['domain_activity']);
          $contact = $_POST['contact'];
          $phone = $_POST['phone'];
          $mail = $_POST['mail'];
          $web = $_POST['web'];

          if(!empty($title) && $title !== "N/C") {
            $title = $_POST['title'];
          } else {
            $valid = false;
            $error['title'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer le nom de l'entreprise</div>";
          }

          if(!empty($street) && $street !== "N/C") {
            $street = $_POST['street'];
          } else {
            $valid = false;
            $error['street'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer la rue de  l'entreprise</div>";
          }

          if(!empty($postal_code) && $postal_code !== "N/C") {
            $postal_code = $_POST['postal_code'];
          } else {
            $valid = false;
            $error['postal_code'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer le code postal de l'organisme de formation</div>";
          }

          if(!empty($city) && $city !== "N/C") {
            $city = $_POST['city'];
          } else {
            $valid = false;
            $error['city'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer la ville de l'organisme de formation</div>";
          }

          if(!empty($activity) && $activity !== "N/C") {
            $activity = $_POST['activity'];
          } else {
            $valid = false;
            $error['activity'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer l'activité de l'entreprise</div>";
          }

          if(!empty($domain_activity) && $domain_activity !== "N/C") {
            $domain_activity = $_POST['domain_activity'];
          } else {
            $valid = false;
            $error['domain_activity'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer le domaine d'activité de l'entreprise</div>";
          }

          if(!empty($phone) && $phone !== "N/C") {
            $phone = $_POST['phone'];
          } else {
            $phone = "N/C";
          }

          if(!empty($contact) && $contact !== "N/C") {
            $contact = $_POST['contact'];
          } else {
            $contact = "N/C";
          }

          if(!empty($mail) && $mail !== "N/C") {
            $mail = $_POST['mail'];
          } else {
            $mail = "N/C";
          }

          if(!empty($web) && $web !== "N/C") {
            $web = $_POST['web'];
          } else {
            $web = "N/C";
          }

          if (isset($_POST['done'])) {
            $done = true;
          }

          if ($valid) {
            $sql = "INSERT INTO entreprises (title, image, number_street, street, postal_code, city, activity, domain_activity, contact, phone, mail, web, done) VALUES ('$title', '$imageName', '$number_street', '$street', '$postal_code', '$city', '$activity', '$domain_activity', '$contact', '$phone', '$mail', '$web', '$done')";
            $valid_sql = mysqli_query($db, $sql);

            if ($valid_sql) {
              $informations['success'] = "<div class='alert alert-black' role='alert'>Vos informations ont bien été inscrites dans la base de données et l'image uploadée dans le dossier 'images'.</div>
              <div class='btn-group'>
              <a class='btn btn-success' href='enterprises.php'>Retour à la liste des entreprises</a>
              <a class='btn btn-info' href='create_enterprises.php'>Créer une autre entreprise</a></div>";
            }
          }

        } else {
          $error['upload'] = "<div class='alert alert-warning' role='alert'>Une erreur est survenue !!!<div>";
        }
      } else {
        $error['size'] = "<div class='alert alert-warning' role='alert'>La taille de l'image est trop volumineuse !!!<div>";
      }
    } else {
      $error['download'] = "<div class='alert alert-warning role='alert'>Une erreur est survenue lors du téléchargement !!!<div>";
    }
  } else {
    $error['format'] = "<div class='alert alert-warning' role='alert'>Votre fichier n'est pas au format image souhaité !!!<div>";
  }
}

?>

<div class="container-fluid text-center">

  <?php

  if (isset($informations['success'])) {
    echo $informations['success'];
  }

  if (isset($error['valid'])) {
    echo $error['valid'];
  }

  if (isset($error['upload'])) {
    echo $error['upload'];
  }

  if (isset($error['size'])) {
    echo $error['size'];
  }

  if (isset($error['download'])) {
    echo $error['download'];
  }

  if (isset($error['format'])) {
    echo $error['format'];
  }

  if (isset($error['title'])) {
    echo $error['title'];
  }

  if (isset($error['street'])) {
    echo $error['street'];
  }

  if (isset($error['postal_code'])) {
    echo $error['postal_code'];
  }

  if (isset($error['city'])) {
    echo $error['city'];
  }

  if (isset($error['activity'])) {
    echo $error['activity'];
  }

  if (isset($error['domain_activity'])) {
    echo $error['domain_activity'];
  }
   ?>

<legend>Creation d'une fiche entreprise</legend>
<form action="#" method="post" enctype="multipart/form-data">

<div class="form-group">
<label class="col-2" for="title">Nom de l'entreprise</label>
<input class="col-4" type="text" name="title" value="<?= htmlentities($title) ?>" required />
</div>

<div class="form-group">
  <label class="col-2" for="number_street">Numéro de l'adresse</label>
  <input class="col-4" type="numeric" name="number_street" value="<?= htmlentities($number_street) ?>" />
</div>

<div class="form-group">
  <label class="col-2" for="street">Adresse de l'entreprise</label>
  <input class="col-4" type="text" name="street" value="<?= htmlentities($street) ?>" placeholder="exemple: avenue Jean Jaurès"required />
</div>

<div class="form-group">
  <label class="col-2" for="postal_code">Code postal de la ville</label>
  <input class="col-4" type="numeric" name="postal_code" value="<?= htmlentities($postal_code) ?>" required />
</div>

<div class="form-group">
  <label class="col-2" for="city">Ville de l'entreprise</label>
  <input class="col-4" type="text" name="city" value="<?= htmlentities($city) ?>" required />
</div>

<div class="row">
  <div class="form-group col-6">
    <label class="col-4" for="activity">Secteur(s) d'activité(s)</label>
    <input class="col-6" type="text" name="activity" value="<?= htmlentities($activity) ?>" placeholder="exemple: Métallurgie "required />
  </div>

  <div class="form-group col-6">
    <label class="col-4" for="domain_activity">Domaine d'activité</label>
    <input class="col-6" type="text" name="domain_activity" value="<?= htmlentities($domain_activity) ?>" placeholder="exemple: Industrie" required />
  </div>
</div>

<div class="row">
  <div class="form-group col-6">
    <label class="col-4" for="contact">Contact</label>
    <input class="col-6" type="text" name="contact" value="<?= htmlentities($contact) ?>" placeholder="exemple: Mr Dupont Claude" />
  </div>
  <div class="form-group col-6">
    <label class="col-4" for="phone">Numéro de téléphone</label>
    <input class="col-6" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace exemple: 0321587526" />
  </div>
</div>

<div class="row">
  <div class="form-group col-6">
    <label class="col-4" for="mail">Adresse mail</label>
    <input class="col-6" type="mail" name="mail" value="<?= htmlentities($mail) ?>" />
  </div>

  <div class="form-group col-6">
    <label class="col-4" for="web">Site web</label>
    <input class="col-6" type="text" name="web" value="<?= htmlentities($web) ?>" placeholder="exemple: " />
  </div>
</div>

<div class="form-check">
  <label class="form-check-label col-12">
    <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
    Cochez ici si vous voulez l'afficher sur la page entreprise
  </label>
</div>

<div class="form-inline">
  <label for="image">Logo à télécharger pour l'entreprise</label>
  <input type="file" name="image" class="form-control-file" id='image' required />
</div>

<button type="submit" name="upload" class="btn btn-primary">Valider</button>

</form>
</div>

<?php
include('../include/footer.php');
?>
