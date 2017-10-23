<?php
require('../../../config/db_home.php');
include('../include/header.php');

try {
  $db = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_base
  );
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$id = null;
$valid = true;
$errors = [];
$informations = [];
$image = null;

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = 'Vous devez spécifier une image à supprimer';
}

if ($valid) {
  $sql = sprintf("SELECT * FROM home WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos= $result->fetch_assoc();
  $image = $infos['image'];

  try {
    $delete = unlink ("../images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM home WHERE id ='%s'", $id);
      $sql = $db->query($request);

      $informations['delete'] = "<div class='alert alert-danger center'>  $sql image supprimée (id:  $id  )</div>\n";
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }

}

?>
<div class="container-fluid">
  <?php
  if (isset($informations['delete'])) {
    echo $informations['delete'];
  }
  ?>

  <div>
    <a href="../home.php" name="retour" class="btn btn-primary centered">Retour</a>
  </div>
  <?php

  if (isset($errors['id'])) {
    echo $errors['id'];
  }

  ?>
</div>



<?php

include('../include/footer.php');
?>
