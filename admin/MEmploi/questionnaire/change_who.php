<?php
include('../include/header.php');

$informations = [];
$errors = [];
$valid = true;
$title = '';
$image = '';
$question = '';
$index = null;
$response = '';

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
  $id = $_GET['id'];

  $sql = sprintf("SELECT * FROM who WHERE id =%s", $_GET['id']);
  $result = $db->query($sql);
  $infos = $result->fetch_assoc();

  $title = $infos['title'];
  $image = $infos['image'];
  $question = $infos['question'];
  $index = $infos['indice'];
  $response = $infos['response'];
} else {
  $valid = false;
  $errors['id'] = "<div class='alert alert-danger' role='alert'>L'identifiant du quizz Qui est-ce ? à modifier doit être spécifié !!!";
}
if (isset($_POST['valider'])) {
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
  } else {
    $valid = false;
    $errors['title'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner un nom au Qui est-ce? !!!</div>";
  }
  if (isset($_POST['image']) && !empty(trim($_POST['image']))) {
    $image = $_POST['image'];
  } else {
    $valid = false;
    $errors['image'] = "<div class='alert alert-danger text-center role='alert''>Vous ne pouvez pas enlever l'image !!!</div>";
  }
  if (isset($_POST['question']) && !empty(trim($_POST['question']))) {
    $question = $_POST['question'];
  } else {
    $valid = false;
    $errors['question'] = "<div class='alert alert-danger text-center role='alert''>Vous devez indiquer la question !!!</div>";
  }
  if (isset($_POST['response']) && !empty(trim($_POST['response']))) {
    $response = $_POST['response'];
  } else {
    $valid = false;
    $errors['response'] = "<div class='alert alert-danger text-center role='alert''>Vous devez donner au moins indiquer une réponse !!!</div>";
  }
  if (isset($_POST['index']) && !empty(trim($_POST['index']))) {
    $index = $_POST['index'];
  } else {
    $index = null;
  }
  if ($valid) {
    try {
      $sql = sprintf("UPDATE who SET title='$title', image='$image', question='$question', indice='$index', response='$response' WHERE id='%s'", $_GET['id']);
      $valid_sql = mysqli_query($db, $sql);

    } catch (Exception $e) {
      header('Location: error500.html', true, 302);
      exit();
    }
    if ($valid_sql) {
      $informations['success'] = "<div class='alert alert-dark text-center' role='alert'>Quizz Qui est-ce ? $title modifié";
    }
  }
}
?>
<div class="container-fluid text-center">
  <?php
  if (isset($informations['success'])) {
    echo $informations['success'];
  }
  if (isset($errors['id'])) {
    echo $errors['id'];
  }
  if (isset($errors['title'])) {
    echo $errors['title'];
  }
  if (isset($errors['question'])) {
    echo $errors['question'];
  }
  if (isset($errors['response'])) {
    echo $errors['response'];
  }
  ?>
  <legend>Modification du quizz Qui est-ce ? <?= $title ?></legend>
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-2" for="title">Nom du quizz</label>
      <input class="col-10" type="text" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="image">Nom de l'image du quizz</label>
      <input class="col-10" type="text" name="image" value="<?= htmlentities($image) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="question">Question</label>
      <input class="col-10" type="text" name="question" value="<?= htmlentities($question) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="index">Indice</label>
      <input class="col-10" type="text" name="index" value="<?= htmlentities($index) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="response">Réponse</label>
      <input class="col-10" type="text" name="response" value="<?= htmlentities($response) ?>" required />
    </div>
    <button type="submit" name="valider" class="btn btn-primary">Valider</button>
  </form>
</div>
<?php include('../include/footer.php');?>
