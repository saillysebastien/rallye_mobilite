<?php
include("../include/header.php");

$errors = [];
$infos = [];

$title = "";
$name = "";
$question = "";
$one = "";
$two = "";
$three = "";
$four = "";
$five = "";
$my_all = "";
$index = "";
$response = "";
$image = "";
$start = "";
$end = "";
$valid = true;

if (isset($_POST['upload_rebus'])) {
  $sql = sprintf("SELECT * FROM rebus WHERE id=%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $name = $result['name'];
  $one = $result['one'];
  $two = $result['two'];
  $three = $result['three'];
  $four = $result['four'];
  $five = $result['five'];
  $my_all = $result['my_all'];
  $response = $result['response'];
  $index = $result['indice'];

  $update = sprintf("UPDATE appli SET title='gpe3pg8', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image' WHERE id='28'");
  $update_db = mysqli_query($db, $update);
}

if (isset($_POST['upload_who'])) {
  $sql = sprintf("SELECT * FROM who WHERE id=%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $name = $result['title'];
  $image = $result['image'];
  $question = $result['question'];
  $index = $result['indice'];
  $response = $result['response'];

  $update = sprintf("UPDATE appli SET title='gpe3pg8', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image' WHERE id='28'");
  $update_db = mysqli_query($db, $update);
}

if (isset($_POST['upload_quizz'])) {
  $sql = sprintf("SELECT * FROM quizz WHERE id=%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $name = $result['title'];
  $question = $result['question'];
  $index = $result['indice'];
  $response = $result['response'];

  $update = sprintf("UPDATE appli SET title='gpe3pg8', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image' WHERE id='28'");
  $update_db = mysqli_query($db, $update);
}
if ($_GET["id"] == "28") {
  array_push($infos, "Question pour l'étape 8 mis à jour, veuillez rentrer les adresses demandées pour Maps.");
}
if (isset($_POST['locate'])) {
  $start = $_POST['start'];
  $end = $_POST['end'];

  if (isset($_POST['start']) && !empty(trim($_POST['start']))) {
    $start = $_POST['start'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner l'adresse de départ pour Maps !");
  }
  if (isset($_POST['end']) && !empty(trim($_POST['end']))) {
    $end = $_POST['end'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner l'adresse d'arrivée pour Maps !");
  }
  if ($valid) {
    $update = sprintf("UPDATE locate SET name='gpe3pg8', start_traject='$start', end_traject='$end', qr_code='afpa-70x70.png' WHERE id='28'");
    $update_locate = mysqli_query($db, $update);
    $sql_qr = "SELECT * FROM locate WHERE id = '28'";
    $query = $db->query($sql_qr);
    while($result = $query->fetch_assoc()) {
      array_push($infos, "<div>Qr code à imprimer si besoin</div>");
      array_push($infos, '<img class="img img-fluid" src="../images/'.$result["qr_code"].'" alt="image du qr-code">');
    }
  }
}
?>
<div class="container text-center">
  <?php
  include('../errors.php');
  include('../infos.php');
  ?>
  <div class="row justify-content-center">
  <form class="form-group col-8" target="_parent" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label class="col-12" for="start"> Adresse de départ </label>
  <input class="col-12 text-center" type="text" placeholder="Entrée ici l\'adresse où se trouve actuellement le groupe ex: 12 rue Bollaert 62300 Lens" name="start" value="<?= htmlentities($start) ?>" />
  </div>
  <div class="form-group">
  <label class="col-12" for="end"> Adresse d\'arrivée </label>
  <input class="col-12 text-center" type="text" placeholder="Entrée ici l\'adresse où va aller le groupe ex: 15 rue Jean Jaures 62800 Liévin" name="end" value="<?= htmlentities($end) ?>" />
  </div>
  <button type="submit" name="locate" class="btn btn-primary">Valider</button>
  </form>
  </div>
  </div>
<?php include("../include/footer.php");
