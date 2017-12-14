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
      if ($imageSize < 1000000) {
        $imageDestination = '../images/' . $imageName;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);
        if ($uploadSuccess) {
          $title = $_POST['title'];
          $web = $_POST['web'];

          if(!empty($title)) {
            $title = $_POST['title'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le nom du moyen de transport !");
          }
          if(!empty($web)) {
            $web = $_POST['web'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le site web !");
          }
          if (isset($_POST['done'])) {
            $done = true;
          }
          if ($valid) {
            $sql = "INSERT INTO mobility (title, image, web, done) VALUES ('$title', '$imageName', '$web', '$done')";
            $valid_sql = mysqli_query($db, $sql);
            if ($valid_sql) {
              array_push($infos, "Le moyen de transport $title a été créé et inscrit dans la base de données, l'image $imageName uploadée dans le dossier");
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
    array_push($errors, "Votre fichier n'est pas au format image souhaité");
  }
}
?>
<div class="container-fluid text-center">
  <legend>Creation d'une fiche entreprise</legend>
  <?php
  include('../../infos.php');
  include('../../errors.php');
  ?>
  <div class="row justify-content-center">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="title">Nom du moyen de transport</label>
        <input class="col-8" type="text" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="web">Site web</label>
        <input class="col-8" type="text" name="web" value="<?= htmlentities($web) ?>" required />
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
          Cochez ici si vous voulez l'afficher sur la page mobilité
        </label>
      </div>

      <div class="form-inline text-center">
        <label class="col-12" for="image">Logo à télécharger pour le moyen de transport</label>
        <input type="file" name="image" class="form-control-file" id='image' required />
      </div><br />
      <button type="submit" name="upload" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
<?php include('../include/footer.php');
