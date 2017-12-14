<?php
include('../include/header.php');

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
<div class="container text-align create_home">
  <legend>Création pour la rubrique accueil (photos et commentaires)</legend>
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
  <form  action="create_caroussel.php" method="post" enctype="multipart/form-data" class="home">
    <div class="form-group">
      <label class="col-2" for="title">Lieu de la visite</label>
      <input type="text" placeholder="Uniquement le lieu exemple: Arvato" class="col-6" name="title" id="title" value="<?= htmlentities($title) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="text">Date de la visite</label>
      <input class="col-6" type="text" name="text" placeholder="Uniquement la date exemple: Février 2017" id="text" value="<?= htmlentities($text) ?>" />
    </div>

    <div class="form-check">
      <label class="form-check-label col-12">
        <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
        Cochez ici si vous voulez l'afficher sur la page accueil
      </label>
    </div>

    <div class="form-group">
      <label for="image">Image à télécharger pour la page d'accueil</label>
      <input type="file" name="image" class="form-control-file" id='image' required="" />
    </div>
    <button type="submit" name="upload" class="btn btn-primary">Valider</button>
  </form>
</div>
<?php include('../include/footer.php');
