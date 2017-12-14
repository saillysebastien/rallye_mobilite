<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM formations WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $title = $result['title'];
  $image = $result['image'];
  $number_street = $result['number_street'];
  $street = $result['street'];
  $postal_code = $result['postal_code'];
  $city = $result['city'];
  $contact = $result['contact'];
  $mail = $result['mail'];
  $web = $result['web'];

  if(!empty($phone) && $phone !== "N/C") {
    $phone = $result['phone'];
  } else {
    $phone = "N/C";
  }
} else {
  $valid = false;
  array_push($errors, "L'identifiant de l'organisme de formation doit être spécifié !");
}
if ($_POST) {
  if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id2 = $_POST['id'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer l'identifiant (id) !");
  }
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un nom à l'organisme de formation !");
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
    array_push($errors, "Vous devez indiquer l'adresse de l'organisme de formation !");
  }
  if (isset($_POST['postal_code']) && !empty(trim($_POST['postal_code']))) {
    $postal_code= $_POST['postal_code'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer le code postal de l'organisme de formation !");
  }
  if (isset($_POST['city']) && !empty(trim($_POST['city']))) {
    $city = $_POST['city'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la ville de l'organisme de formation !");
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
  if (isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
    $phone = $_POST['phone'];
  } else {
    $phone = "N/C";
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
      $sql = sprintf("UPDATE formations SET id='$id2', title='$title', image='$image', number_street='$number_street', street='$street', postal_code='$postal_code', city='$city', contact='$contact', phone='$phone', mail='$mail', web='$web', done='$done' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);
    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($infos, "L'organisme de formation $title a été modifié.");
    }
  }
}
?>
<div class="container-fluid text-center">
  <div class="col-12">
    <legend>Modification d'une fiche FORMATION</legend>
    <?php
    include('../../infos.php');
    include('../../errors.php');
    ?>
    <div class="row justify-content-center text-center">
      <form method="post" enctype="multipart/form-data">

        <div class="form-group text-center">
          <label class="col-12" for="id">Identifiant de la formation</label>
          <input type="numeric" class="col-8 text-center" name="id" value="<?= htmlentities($id) ?>" required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="title">Nom de la formation</label>
          <input class="col-8 text-center" type="text" name="title" value="<?= htmlentities($title) ?>" required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="number_street">Numéro de l'adresse</label>
          <input class="col-8 text-center" type="numeric" name="number_street" value="<?= htmlentities($number_street) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="street">Adresse de la formation</label>
          <input class="col-8 text-center" type="text" name="street" value="<?= htmlentities($street) ?>" placeholder="exemple: avenue Jean Jaurès"required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="postal_code">Code postal de la ville</label>
          <input class="col-8 text-center" type="numeric" name="postal_code" value="<?= htmlentities($postal_code) ?>" required />
        </div>
        <div class="form-group text-center">
          <label class="col-12" for="city">Ville de la formation</label>
          <input class="col-8 text-center" type="text" name="city" value="<?= htmlentities($city) ?>" required />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="contact">Contact</label>
          <input class="col-8 text-center" type="text" name="contact" value="<?= htmlentities($contact) ?>" placeholder="exemple: Mr Dupont Claude" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="phone">Numéro de téléphone</label>
          <input class="col-8 text-center" type="numeric" name="phone" maxlength="10" value="<?= htmlentities($phone) ?>" placeholder="exemple: 0321281510" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="mail">Adresse mail</label>
          <input class="col-8 text-center" type="mail" name="mail" value="<?= htmlentities($mail) ?>" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="web">Site web</label>
          <input class="col-8 text-center" type="text" name="web" value="<?= htmlentities($web) ?>" placeholder="exemple: www.afpa.fr" />
        </div>

        <div class="form-group text-center">
          <label class="col-12" for="text">Nom de l'image</label>
          <input class="col-8 text-center" type="text" name="image2" id="text" value="<?= htmlentities($image) ?>"  />
        </div>

        <div class="form-check">
          <label class="form-check-label col-12">
            <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
            Cochez ici si vous voulez que cette formation soit affichée !
          </label>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Valider</button>
      </form>
    </div>
  </div>
</div>
<?php include('../include/footer.php');
