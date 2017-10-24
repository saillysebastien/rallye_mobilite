<?php

require('../../../config/db_home.php');

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

$title = '';
$number_street = null;
$street = '';
$postal_code = null;
$city = '';
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
        $imageNameNew = uniqid('', true) . " . " . $imageActualExt;
        $imageDestination = '../images/' . $imageNameNew;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);

        if ($uploadSuccess) {
          $title = $_POST['title'];
          $number_street = $_POST['number_street'];
          $street = $_POST['street'];
          $postal_code = $_POST['postal_code'];
          $city = $_POST['city'];
          $contact = $_POST['contact'];
          $phone = $_POST['phone'];
          $mail = $_POST['mail'];
          $web = $_POST['web'];

          if (isset($_POST['done'])) {
            $done = true;
          }

          $sql = "INSERT INTO entreprises (title, number_street, street, postal_code, city, contact, phone, mail, web, done) VALUES ('$title', '$number_street', '$street', '$postal_code', '$city', '$contact', '$phone', '$mail', '$web', '$done')";
          mysqli_query($db, $sql);

          // header("Location: ../entreprises.php");
        } else {
          echo "Une erreur est survenue!";
          printf('<div class="alert alert-warning">Une erreur est survenue!<div>
          <div class="btn btn-success" href="create_entreprise.php"');
        }
      } else {
        echo "Votre image est trop volumineuse!";
      }
    } else {
      echo "Une erreur est survenue lors du téléchargement!";
    }
  } else {
    echo "Votre fichier n'est pas au format image souhaité!";
  }
}

?>
