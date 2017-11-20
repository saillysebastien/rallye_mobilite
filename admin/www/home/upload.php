<?php
include('../include/header.php');

$done = false;
$text = '';
$title = '';
$infos = [];

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
        $imageDestination = '../images/'.$imageName;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);
        if ($uploadSuccess) {
          $title = $_POST['title'];
          $text = $_POST['text'];
          if (isset($_POST['done'])) {
            $done = true;
          }
          $sql = "INSERT INTO home (title, image, text, done) VALUES ('$title', '$imageName', '$text', '$done')";
          $valid = mysqli_query($db, $sql);
          if ($valid) {
            array_push($infos, "Les informations ont été inscrites à la base de données et l'ima $imageName uploadée dans le dossier.");
          }
        } else {
          array_push($errors, "Une erreur est survenue !");
        }
      } else {
        array_push($errors, "Votre image est trop volumineuse !");
      }
    } else {
      array_push($errors, "Une erreur est survenue lors du téléchargement !");
    }
  } else {
    array_push($errors, "Votre fichier image n'est pas au format souhaité !");
  }
}
?>
<div class="container-fluid">
  <?php
include("../infos.php");
include("../errors.php");
  ?>
</div>
<?php include('../include/footer.php');?>
