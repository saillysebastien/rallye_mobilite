<?php
include('../include/header.php');

$infos =[];
$errors = [];
$title = '';
$image = '';
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

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];
  $sql = sprintf("SELECT * FROM entreprises WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $image = $result['image'];
  $number_street = $result['number_street'];
  $street = $result['street'];
  $postal_code = $result['postal_code'];
  $city = $result['city'];
  $activity = $result['activity'];
  $domain_activity = strtolower($result['domain_activity']);
  $contact = $result['contact'];
  $phone = $result['phone'];
  $mail = $result['mail'];
  $web = $result['web'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier une image à supprimer !");
}
if ($_POST) {
  $valid = true;
  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un identifiant (id) !");
  }
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le nom de l'entreprise !");
  }
  if (isset($_POST['number_street']) && !empty(trim($_POST['number_street']))) {
    $number_street = $_POST['number_street'];
  } else {
    $number_street = null;
  }
  if (isset($_POST['street']) && !empty(trim($_POST['street']))) {
    $street = $_POST['street'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la rue de l'entreprise !");
  }
  if (isset($_POST['postal_code']) && !empty(trim($_POST['postal_code']))) {
    $postal_code= $_POST['postal_code'];
  } else {
    $valid = "N/C";
    array_push($errors, "Vous devez indiquer le code postal de l'entreprise !");
  }
  if (isset($_POST['city']) && !empty(trim($_POST['city']))) {
    $city = $_POST['city'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la ville de l'entreprise !");
  }
  if (isset($_POST['activity']) && !empty(trim($_POST['activity']))) {
    $activity = $_POST['activity'];
  } else {
    $activity = "N/C";
  }
  if (isset($_POST['domain_activity']) && !empty(trim($_POST['domain_activity']))) {
    $domain_activity = $_POST['domain_activity'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le domaine d'activité de l'entreprise !");
  }
  if (isset($_POST['image2']) && !empty(trim($_POST['image2']))) {
    $image = $_POST['image2'];
  } else {
    $valid = false;
    array_push($errors, "Vous ne pouvez pas enlever l'image !");
  }
  if (isset($_POST['contact']) && !empty(trim($_POST['contact']))) {
    $contact = $_POST['contact'];
  } else {
    $contact = "N/C";
  }
  if (isset($_POST['mail']) && !empty(trim($_POST['mail']))) {
    $mail = $_POST['mail'];
  } else {
    $mail = "N/C";
  }
  if (isset($_POST['web']) && !empty(trim($_POST['web']))) {
    $web = $_POST['web'];
  } else {
    $web = "N/C";
  }
  if (isset($_POST['done'])) {
    $done = true;
  }
  if ($valid) {
    try {
      $sql = sprintf("UPDATE entreprises SET id='$id2', title='$title', image='$image', number_street='$number_street', street='$street', postal_code='$postal_code', city='$city', activity='$activity', domain_activity='$domain_activity', contact='$contact', phone='$phone', mail='$mail', web='$web', done='$done' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($infos, "Entreprise $title modifiée");
    }
  }
}
?>
<div class="container-fluid text-center">
  <?php
  include("../infos.php");
  include("../errors.php");
  ?>
  <div class="row justify-content-center">
    <div class="col-12">
      <h1>Modification d'une fiche ENTREPRISE</h1>
      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-2" for="id">Identifiant de l'entreprise</label>
            <input type="numeric" class="col-10" name="id" value="<?= htmlentities($id) ?>" required />
          </div>

          <div class="form-group">
            <label class="col-2" for="title">Nom de l'entreprise</label>
            <input class="col-10" type="text" name="title" value="<?= htmlentities($title) ?>" required />
          </div>

          <div class="form-group">
            <label class="col-2" for="number_street">Numéro de l'adresse</label>
            <input class="col-10" type="numeric" name="number_street" value="<?= htmlentities($number_street) ?>" />
          </div>

          <div class="form-group6">
            <label class="col-2" for="street">Adresse de l'entreprise</label>
            <input class="col-10" type="text" name="street" value="<?= htmlentities($street) ?>" placeholder="exemple: avenue Jean Jaurès"required />
          </div>

          <div class="form-group">
            <label class="col-2" for="postal_code">Code postal de la ville</label>
            <input class="col-10" type="numeric" name="postal_code" value="<?= htmlentities($postal_code) ?>" required />
          </div>

          <div class="form-group">
            <label class="col-2" for="city">Ville de l'entreprise</label>
            <input class="col-10" type="text" name="city" value="<?= htmlentities($city) ?>" required />
          </div>

          <div class="form-group">
            <label class="col-2" for="activity">Secteur(s) d'activité(s)</label>
            <input class="col-10" type="text" name="activity" value="<?= htmlentities($activity) ?>" placeholder="exemple: Métallurgie "required />
          </div>

          <div class="form-group">
            <label class="col-2" for="domain_activity">Domaine d'activité</label>
            <input class="col-10" type="text" name="domain_activity" value="<?= htmlentities($domain_activity) ?>" placeholder="exemple: Industrie" required />
          </div>

          <div class="form-group">
            <label class="col-2" for="contact">Contact</label>
            <input class="col-10" type="text" name="contact" value="<?= htmlentities($contact) ?>" placeholder="exemple: Mr Dupont Claude" />
          </div>

          <div class="form-group">
            <label class="col-2" for="phone">Numéro de téléphone</label>
            <input class="col-10" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="exemple: +33 3 21 28 15 10" />
          </div>

          <div class="form-group">
            <label class="col-2" for="mail">Adresse mail</label>
            <input class="col-10" type="mail" name="mail" value="<?= htmlentities($mail) ?>" />
          </div>

          <div class="form-group">
            <label class="col-2" for="web">Site web</label>
            <input class="col-10" type="text" name="web" value="<?= htmlentities($web) ?>" placeholder="exemple: www.afpa.fr " />
          </div>

          <div class="form-group">
            <label class="col-2" for="text">Nom de l'image</label>
            <input class="col-10" type="text" name="image2" id="text" value="<?= htmlentities($image) ?>"  />
          </div>

          <div class="form-check">
            <label class="form-check-label col-12">
              <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
              Cochez ici si vous voulez que cette entreprise soit affiché!
            </label>
          </div>
        </div>
        <br /><button type="submit" name="update" class="btn btn-primary">Valider</button>
      </form>
    </div>
  </div>
</div>
<?php include('../include/footer.php');?>
