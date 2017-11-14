<?php

include('../include/header.php');
require('../../../config/connect.php');

$informations = [];
$error = [];
$valid = true;

$title = '';
$image = '';
$question = '';
$index = null;
$response = '';



if (isset($_POST['valider'])) {
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
        $imageDestination = 'images/' . $imageName;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);

        if ($uploadSuccess) {
          $title = strtolower($_POST['title']);
          $question = $_POST['question'];
          $index = $_POST['index'];
          $response = strtolower($_POST['response']);

          if(!empty($title)) {
            $title = strtolower($_POST['title']);
          } else {
            $valid = false;
            $error['title'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer un titre pour ce Qui est-ce? !!!</div>";
          }

          if(!empty($question)) {
            $question = $_POST['question'];
          } else {
            $valid = false;
            $error['question'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer la question !!!</div>";
          }

          if(!empty($response)) {
            $response = strtolower($_POST['response']);
          } else {
            $valid = false;
            $error['response'] = "<div class='alert alert-danger' role='alert'>Vous devez indiquer la réponse !!!</div>";
          }

          if(!empty($index)) {
            $index = $_POST['index'];
          } else {
            $index = null;
          }

          if ($valid) {
            $sql = "INSERT INTO who (title, image, question, indice, response) VALUES ('$title', '$imageName', '$question', '$index', '$response')";
            $valid_sql = mysqli_query($db, $sql);

            if ($valid_sql) {
              $informations['success'] = "<div class='alert alert-black' role='alert'>Le questionnaire $title a été créé, les informations ont bien été inscrites dans la base de données et l'image uploadée dans le dossier 'images'.</div>";
            }
          }

        } else {
          $error['upload'] = "<div class='alert alert-warning' role='alert'>Une erreur est survenue !!!<div>";
        }
      } else {
        $error['size'] = "<div class='alert alert-warning' role='alert'>La taille de l'image est trop volumineuse !!!<div>";
      }
    } else {
      $error['download'] = "<div class='alert alert-warning' role='alert'>Une erreur est survenue lors du téléchargement !!!<div>";
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

  if (isset($error['question'])) {
    echo $error['question'];
  }

  if (isset($error['response'])) {
    echo $error['response'];
  }
   ?>

   <legend>Creation d'un quizz Qui est-ce?</legend>
   <form action="#" method="post" enctype="multipart/form-data">

   <div class="form-group">
   <label class="col-2" for="title">Nom du quizz</label>
   <input class="col-4" type="text" name="title" value="<?= htmlentities($title) ?>" required />
   </div>

   <div class="form-group">
   <label class="col-2" for="question">Question</label>
   <input class="col-4" type="text" name="question" value="<?= htmlentities($question) ?>" required />
   </div>

   <div class="form-group">
   <label class="col-2" for="index">Indice</label>
   <input class="col-4" type="text" name="index" value="<?= htmlentities($index) ?>" />
   </div>

   <div class="form-group">
   <label class="col-2" for="response">Réponse</label>
   <input class="col-4" type="text" name="response" value="<?= htmlentities($response) ?>" required />
   </div>

   <div class="form-group">
     <label for="image">Logo à télécharger pour le quizz Qui est-ce?</label>
     <input type="file" name="image" class="form-control-file" id='image' required />
   </div>

   <button type="submit" name="valider" class="btn btn-primary">Valider</button>

   </form>
   </div>

   <?php
   include('../include/footer.php');
   ?>
