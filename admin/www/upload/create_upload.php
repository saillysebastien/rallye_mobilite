<?php
include('../include/header.php');

$infos = [];
$errors = [];
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
            array_push($infos, "Le nom de l'image $imageName a bien été inscrite dans la base de données et uploadée dans le dossier.");
          } else {
            array_push($errors, "Une erreur est survenue lors du remplissage du formulaire !");
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
  <legend>Téléchargement d'une nouvelle image </legend>
  <div class="row justify-content-center">
    <form  action="create_upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group text-center">
        <label class="col-12" for="image">Image à télécharger</label>
        <input type="file" name="image" class="form-control-file" required />
      </div>
      <button type="submit" name="upload" id="upload" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
<?php include('../include/footer.php');?>
