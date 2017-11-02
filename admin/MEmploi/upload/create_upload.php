<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$error = [];
$valid = true;

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
          $image = $_POST['image'];
            $upload = "INSERT INTO upload (image) VALUES ('$imageName')";
            $valid_upload = mysqli_query($db, $upload);

            if ($valid_upload) {
              $informations['success'] = "<div class='alert alert-info text-center' role='alert'>Le nom de l'image a bien été inscrite dans la base de données et l'image uploadée dans le dossier 'images'.</div>
              <div class='text-center'>
              <a class='btn btn-success' href='images.php'>Retour à la liste des images</a>
              <a class='btn btn-info' href='create_uplaod.php'>Créer un autre téléchargement d'image</a></div>";
            }
          } else {
            $error['valid'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du remplissage du formulaire !!!<div>";
          }
        } else {
          $error['upload'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue!<div>";
        }
      } else {
        $error['size'] = "<div class='alert alert-warning text-center' role='alert'>La taille de l'image est trop volumineuse!<div>";
      }
    } else {
      $error['download'] = "<div class='alert alert-warning text-center' role='alert'>Une erreur est survenue lors du téléchargement!<div>";
    }
  } else {
    $error['format'] = "<div class='alert alert-warning text-center' role='alert'>Votre fichier n'est pas au format image souhaité!<div>";
  }



 ?>

 <div class="container-fluid">

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
  ?>

 <legend>Téléchargement d'une image </legend>
   <form  action="#" method="post" enctype="multipart/form-data">

     <div class="form-inline">
       <label for="image">Image à télécharger</label>
       <input type="file" name="image" class="form-control-file" id='image' required />
     </div>

     <button type="submit" name="upload" id="upload" class="btn btn-primary">Valider</button>

   </form>
 </div>

 <?php
 include('../include/footer.php');
  ?>
