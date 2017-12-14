<?php
include('../include/header.php');

//Si un id est présent dans la barre de navigation on continue sinon on arrête
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  // On lance une requête pour récupérer les informations qu'ont affichera dans le formulaire
  $sql = sprintf("SELECT * FROM who WHERE id =%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  //On recupére les infos
  $title = $result['title'];
  $image = $result['image'];
  $question = $result['question'];
  $index = $result['indice'];
  $response = $result['response'];
} else {
  $valid = false;
  array_push($errors, "L'identifiant (id) du quizz Qui est-ce ? doit être spécifié !");
}
if (isset($_POST['valider'])) {
  // On vérifie que les champs obligatoires ne sont pas vite
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez donner un nom au quizz Qui est-ce ?");
  }
  if (isset($_POST['image']) && !empty(trim($_POST['image']))) {
    $image = $_POST['image'];
  } else {
    $valid = false;
    array_push($errors, "Vous ne pouvez pas enlever l'image !");
  }
  if (isset($_POST['question']) && !empty(trim($_POST['question']))) {
    $question = $_POST['question'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la question !");
  }
  if (isset($_POST['response']) && !empty(trim($_POST['response']))) {
    $response = $_POST['response'];
  } else {
    $valid = false;
    array_push($errors, "Vous devez indiquer la réponse !");
  }
  if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }
  //Si tout est bon on lance la requête
  if ($valid) {
    try {
      $sql = sprintf("UPDATE who SET title='$title', image='$image', question='$question', indice='$index', response='$response' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      array_push($errors, "Quiz Qui est-ce ? $title modifié.");
    }
  }
}
?>
<div class="container-fluid text-center">
  <legend>Modification du quizz Qui est-ce ? <?= $title ?></legend>
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group text-center">
      <label class="col-12" for="title">Nom du quizz</label>
      <input class="col-8 text-center" type="text" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="image">Nom de l'image du quizz</label>
      <input class="col-8 text-center" type="text" name="image" value="<?= htmlentities($image) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="question">Question</label>
      <input class="col-8 text-center" type="text" name="question" value="<?= htmlentities($question) ?>" required />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="index">Indice</label>
      <input class="col-8 text-center" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>

    <div class="form-group text-center">
      <label class="col-12" for="response">Réponse</label>
      <input class="col-8 text-center" type="text" name="response" value="<?= htmlentities($response) ?>" required />
    </div>
    <button type="submit" name="valider" class="btn btn-primary">Valider</button>
  </form>
</div><!-- container -->
<?php include('../include/footer.php');?>
