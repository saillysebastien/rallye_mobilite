<?php
include('../include/header.php');

$infos = [];
$errors = [];

$valid = true;
$title = '';
$number_street = null;
$street = '';
$postal_code = null;
$city = '';
$activity = '';
$domain_activity = '';
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
        $imageDestination = '../images/' . $imageName;
        $uploadSuccess = move_uploaded_file($imageTmpName, $imageDestination);
        if ($uploadSuccess) {
          $title = $_POST['title'];
          $number_street = $_POST['number_street'];
          $street = $_POST['street'];
          $postal_code = $_POST['postal_code'];
          $city = $_POST['city'];
          $activity = $_POST['activity'];
          $domain_activity = strtolower($_POST['domain_activity']);
          $contact = $_POST['contact'];
          $phone = $_POST['phone'];
          $mail = $_POST['mail'];
          $web = $_POST['web'];
          if(!empty($title) && $title !== "N/C") {
            $title = $_POST['title'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le nom de l'entreprise !");
          }
          if(!empty($street) && $street !== "N/C") {
            $street = $_POST['street'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer la rue de l'entreprise !");
          }
          if(!empty($postal_code) && $postal_code !== "N/C") {
            $postal_code = $_POST['postal_code'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le code postal de l'entreprise !");
          }
          if(!empty($city) && $city !== "N/C") {
            $city = $_POST['city'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer la ville de l'entreprise !");
          }
          if(!empty($activity) && $activity !== "N/C") {
            $activity = $_POST['activity'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer l'activité de l'entreprise !");
          }
          if(!empty($domain_activity) && $domain_activity !== "N/C") {
            $domain_activity = $_POST['domain_activity'];
          } else {
            $valid = false;
            array_push($errors, "Vous devez indiquer le domaine d'activité de l'entreprise !");
          }
          if(!empty($phone) && $phone !== "N/C") {
            $phone = $_POST['phone'];
          } else {
            $phone = "N/C";
          }
          if(!empty($contact) && $contact !== "N/C") {
            $contact = $_POST['contact'];
          } else {
            $contact = "N/C";
          }
          if(!empty($mail) && $mail !== "N/C") {
            $mail = $_POST['mail'];
          } else {
            $mail = "N/C";
          }
          if(!empty($web) && $web !== "N/C") {
            $web = $_POST['web'];
          } else {
            $web = "N/C";
          }
          if (isset($_POST['done'])) {
            $done = true;
          }
          if ($valid) {
            $sql = "INSERT INTO entreprises (title, image, number_street, street, postal_code, city, activity, domain_activity, contact, phone, mail, web, done) VALUES ('$title', '$imageName', '$number_street', '$street', '$postal_code', '$city', '$activity', '$domain_activity', '$contact', '$phone', '$mail', '$web', '$done')";
            $valid_sql = mysqli_query($db, $sql);
            if ($valid_sql) {
              array_push($infos, "L'entreprise $title a été créée et inscrite dans la base de données, l'image $imageName uploadée dans le dossier");
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
  include('../infos.php');
  include('../errors.php');
  ?>
  <div class="row justify-content-center">
    <form action="create_enterprises.php" method="post" enctype="multipart/form-data">

      <div class="form-group text-center">
        <label class="col-12" for="title">Nom de l'entreprise</label>
        <input class="col-8" type="text" name="title" value="<?= htmlentities($title) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="number_street">Numéro de l'adresse</label>
        <input class="col-8" type="numeric" name="number_street" value="<?= htmlentities($number_street) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="street">Adresse de l'entreprise</label>
        <input class="col-8" type="text" name="street" value="<?= htmlentities($street) ?>" placeholder="exemple: avenue Jean Jaurès"required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="postal_code">Code postal de la ville</label>
        <input class="col-8" type="numeric" name="postal_code" value="<?= htmlentities($postal_code) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="city">Ville de l'entreprise</label>
        <input class="col-8" type="text" name="city" value="<?= htmlentities($city) ?>" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="activity">Secteur(s) d'activité(s)</label>
        <input class="col-8" type="text" name="activity" value="<?= htmlentities($activity) ?>" placeholder="exemple: Métallurgie "required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="domain_activity">Domaine d'activité</label>
        <input class="col-8" type="text" name="domain_activity" value="<?= htmlentities($domain_activity) ?>" placeholder="exemple: Industrie" required />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="contact">Contact</label>
        <input class="col-8" type="text" name="contact" value="<?= htmlentities($contact) ?>" placeholder="exemple: Mr Dupont Claude" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="phone">Numéro de téléphone</label>
        <input class="col-8" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace 0321587526" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="mail">Adresse mail</label>
        <input class="col-8" type="mail" name="mail" value="<?= htmlentities($mail) ?>" />
      </div>

      <div class="form-group text-center">
        <label class="col-12" for="web">Site web</label>
        <input class="col-8" type="text" name="web" value="<?= htmlentities($web) ?>" placeholder="exemple: www.afpa.fr" />
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
          Cochez ici si vous voulez l'afficher sur la page entreprise
        </label>
      </div>

      <div class="form-inline text-center">
        <label class="col-12" for="image">Logo à télécharger pour l'entreprise</label>
        <input type="file" name="image" class="form-control-file" id='image' required />
      </div><br />
      <button type="submit" name="upload" class="btn btn-primary">Valider</button>
    </form>
  </div>
</div>
<?php include('../include/footer.php');?>
