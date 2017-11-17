<?php
include('../include/header.php');

$infos = [];
$errors = [];
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
            array_push($errors, "Vous devez indiquer un titre !");
          }
          if(!empty($question)) {
            $question = $_POST['question'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer la question !");
          }
          if(!empty($response)) {
            $response = strtolower($_POST['response']);
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer la réponse !");
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
              array_push($infos, "Le questionnaire $title a été créé, les informations inscrites dans la base de donéées et l'image uploadée dans le dossier.");
            }
          }
        } else {
          array_push($errors, "Une erreur est survenue !");
        }
      } else {
        array_push($errors, "La taille de l'image est trop volumineuse !");
      }
    } else {
      array_push($errors, "Une erreur est survenue lors du téléchargement !");
    }
  } else {
    array_push($errors, "Votre fichier n'est pas au format image souhaité !");
  }
}
?>
<div class="container-fluid text-center">
  <?php
  include("../infos.php");
  include("../errors.php");
   ?>
   <h1>Creation d'un quizz Qui est-ce?</h1>
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
   <?php include('../include/footer.php');?>
