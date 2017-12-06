<?php
include('../include/header.php');

$infos = [];
$errors = [];

$valid = true;
$title = '';
$text1 = '';
$text2 = '';
$text3 = '';
$text4 = '';
$text5 = '';
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
          $text1 = $_POST['text1'];
          $text2 = $_POST['text2'];
          $text3 = $_POST['text3'];
          $text4 = $_POST['text4'];
          $text5 = $_POST['text5'];
          if(!empty($title) && $title !== "N/C") {
            $title = $_POST['title'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le nom de l'explication !");
          }
          if(!empty($text1)) {
            $text1 = $_POST['text1'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer la première phrase de l'explication !");
          }
          if(!empty($text2)) {
            $text2 = $_POST['text2'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez au moins indiquer une deuxième phrase pour l'explication !");
          }
          if (isset($_POST['done'])) {
            $done = true;
          }
          if ($valid) {
            $sql = "INSERT INTO explication (title, image, text1, text2, text3, text4, text5, done) VALUES ('$title', '$imageName', '$text1', '$text2', '$text3', '$text4', '$text5', '$done')";
            $valid_sql = mysqli_query($db, $sql);
            if ($valid_sql) {
              array_push($infos, "L'explication $title a bien été crée et inscrit dans la base de données, l'image $imageName uploadé dans le dossier.");
            }
          } else {
            array_push($errors, "Une erreur est survenue lors du remplissage du formulaire !");
          }
        } else {
          array_push($errors, "Une erreur est survenue lors de l'upload de l'image !");
        }
      } else {
        array_push($errors, "La taille de l'image est trop volumineuse !");
      }
    } else {
      array_push($errors, "Une erreur est survenue !");
    }
  } else {
    array_push($errors, "Le fichier image n'est pas au format souhaité !");
  }
}
?>
<div class="container-fluid text-center">
  <legend>Création d'une explication pour l'accueil</legend>
  <?php
  include('../infos.php');
  include('../errors.php');
  ?>
  <div class="row justify-content-center">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="title">Titre</label>
        <input class="col-8" type="text" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text1">Texte 1</label>
        <input class="col-8" type="numeric" name="text1" value="<?= htmlentities($text1) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text2">Texte 2</label>
        <input class="col-8" type="text" name="text2" value="<?= htmlentities($text2) ?>"/>
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text3">Texte 3</label>
        <input class="col-8" type="numeric" name="text3" value="<?= htmlentities($text3) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text4">Texte 4</label>
        <input class="col-8" type="text" name="text4" value="<?= htmlentities($text4) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="text5">Texte 5</label>
        <input class="col-8" type="text" name="text5" value="<?= htmlentities($text5) ?>" />
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
          Cochez ici si vous voulez l'afficher
        </label>
      </div>

      <div class="form-inline text-center">
        <label class="col-12" for="image">Logo à télécharger pour l'explication</label>
        <input type="file" name="image" class="form-control-file" id='image' required />
      </div><br />
      <button type="submit" name="upload" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
<?php include('../include/footer.php');?>
