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

$done = false;
$text = '';
$title = '';
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
    if ($imageSize < 10000000) {
      // $imageNameNew = uniqid('', true).".".$imageActualExt;
      $imageDestination = '../images/'.$imageName;
      $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);
      if ($uploadSuccess) {
        $title = $_POST['title'];
        $text = $_POST['text'];
        if (isset($_POST['done'])) {
          $done = true;
        }
        $sql = "INSERT INTO home (title, image, text, done) VALUES('$title', '$imageName', '$text', '$done')";
        mysqli_query($db, $sql);

        header("Location: ../home.php");
      } else {
        echo "Une erreur est survenue!";
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
