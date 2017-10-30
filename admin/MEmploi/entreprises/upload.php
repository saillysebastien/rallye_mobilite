<?php

require('../../../config/db_home.php');
include('../include/header.php');

try {
  $db = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
$informations = [];
$error = [];

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

          if (isset($_POST['done'])) {
            $done = true;
          }

          $sql = "INSERT INTO entreprises (title, image, number_street, street, postal_code, city, activity, domain_activity, contact, phone, mail, web, done) VALUES ('$title', '$imageName', '$number_street', '$street', '$postal_code', '$city', '$activity', '$domain_activity', '$contact', '$phone', '$mail', '$web', '$done')";
          $valid = mysqli_query($db, $sql);

          if ($valid) {
            $informations['success'] = "<div class='alert alert-success center'>Vos informations ont bien été inscrites dans la base de donnée et l'image uploadée dans le dossier images</div>\n
            <br />
            <a class='btn btn-success' href='enterprises.php'>Retour à la liste</a>";
          }
        } else {
          $error['upload'] = "<div class = 'alert alert-warning'>Une erreur est survenue!<div>\n
          <br />
          <a class='btn btn-danger' href='create_entreprise.php'> Retour à la création de l'entreprise</a>";
        }
      } else {
        $error['size'] = "<div class = 'alert alert-warning'>La taille de l'image est trop volumineuse!<div>\n
        <br />
        <a class='btn btn-danger' href='create_entreprise.php'> Retour à la création de l'entreprise</a>";
      }
    } else {
      $error['download'] = "<div class = 'alert alert-warning'>Une erreur est survenue lors du téléchargement!<div>\n
      <br />
      <a class='btn btn-danger' href='create_entreprise.php'> Retour à la création de l'entreprise</a>";
    }
  } else {
    $error['format'] = "<div class = 'alert alert-warning'>Votre fichier n'est pas au format image souhaité!<div>\n
    <br />
    <a class='btn btn-danger' href='create_entreprise.php'> Retour à la création de l'entreprise</a>";
  }
}

?>
<div class="container-fluid">
  <?php

  if (isset($informations['success'])) {
    echo $informations['success'];
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

  ?>
</div>

<?php
include('../include/footer.php');
?>
