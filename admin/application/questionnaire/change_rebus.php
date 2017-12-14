<?php
include('../include/header.php');

//Si on a un id dans la barriere de navigation, on continue sinon on arrête
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  // On effectue une requête pour pouvoir rentrer les informations deja connu dans le formulaire
  $sql = sprintf("SELECT * FROM rebus WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

// on rassemble les informations
  $title = $result['name'];
  $one = $result['one'];
  $two = $result['two'];
  $three = $result['three'];
  $four = $result['four'];
  $five = $result['five'];
  $index = $result['indice'];
  $response = $result['response'];
  $my_all = $result['my_all'];
} else {
  $valid = false;
  array_push($errors, "L'identifiant (id) du rébus doit être spécifié !");
}
if (isset($_POST['valider'])) {
  // Si la personne a validé on effectue les différentes vérifications
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un nom au rébus !");
  }
  if (isset($_POST['one']) && !empty(trim($_POST['one']))) {
    $one = $_POST['one'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner au moins 2 indices !");
  }
  if (isset($_POST['two']) && !empty(trim($_POST['two']))) {
    $two = $_POST['two'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner au moins 2 indices !");
  }
  if (isset($_POST['my_all']) && !empty(trim($_POST['my_all']))) {
    $my_all = $_POST['my_all'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner ce qu'est le tout pour le rébus !");
  }
  if (isset($_POST['response']) && !empty(trim($_POST['response']))) {
    $response = $_POST['response'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner la réponse du rébus !");
  }
  if (isset($_POST['three']) && !empty(trim($_POST['three']))) {
    $three = $_POST['three'];
  } else {
    $three = null;
  }
  if (isset($_POST['four']) && !empty(trim($_POST['four']))) {
    $four = $_POST['four'];
  } else {
    $four = null;
  }
  if (isset($_POST['five']) && !empty(trim($_POST['five']))) {
    $five = $_POST['five'];
  } else {
    $five = null;
  }
  if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }
  // Si toutes les vérifications sont bonnes on envoie la requête
  if ($valid) {
    try {
      $sql = sprintf("UPDATE rebus SET name='$title', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', my_all='$my_all' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);

      array_push($infos, "Rébus $title modifié");

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
  }
}
?>
<div class="container text-center">
<legend class="text-center"> Modification du rébus <?= $title ?> </legend>
<?php
include('../../infos.php');
include('../../errors.php');
?>
<form method="post" enctype="multipart/form-data">

  <div class="form-group text-center">
    <label class="col-12" for="title"> Nom du rébus</label>
    <input class="col-8 text-center" type="text" placeholder="obligatoire" name="title" value="<?= htmlentities($title) ?>" required />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="one"> Question 1 </label>
    <input class="col-8 text-center" type="text" placeholder="obligatoire" name="one" value="<?= htmlentities($one) ?>" required />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="two"> Question 2 </label>
    <input class="col-8 text-center" type="text" placeholder="obligatoire" name="two" value="<?= htmlentities($two) ?>" required />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="three"> Question 3 </label>
    <input class="col-8 text-center" type="text" name="three" value="<?= htmlentities($three) ?>" />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="four"> Question 4 </label>
    <input class="col-8 text-center" type="text" name="four" value="<?= htmlentities($four) ?>" />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="five"> Question 5 </label>
    <input class="col-8 text-center" type="text" name="five" value="<?= htmlentities($five) ?>" />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="index"> Indice </label>
    <input class="col-8 text-center" type="text" name="index" value="<?= htmlentities($index) ?>" />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="my_all"> Mon tout est ...</label>
    <input class="col-8 text-center" type="text" placeholder="obligatoire" name="my_all" value="<?= htmlentities($my_all) ?>" />
  </div>

  <div class="form-group text-center">
    <label class="col-12" for="response">Réponse</label>
    <input class="col-8 text-center" type="text" placeholder="obligatoire" name="response" value="<?= htmlentities($response) ?>" required />
  </div>
  <button type="submit" name="valider" class="btn btn-primary">Valider</button>
</div><!-- fin du container -->
<?php include('../include/footer.php');?>
