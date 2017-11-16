<?php
include('../include/header.php');

$id = null;
$valid = true;
$errors = [];
$informations = [];
$image = null;
$title = '';

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  $errors['id'] = 'Vous devez spécifier une Photo à supprimer';
}
if ($valid) {
  $sql = sprintf("SELECT * FROM home WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos= $result->fetch_assoc();
  $image = $infos['image'];
  $title = $infos['title'];
  try {
    $delete = unlink ("../images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM home WHERE id ='%s'", $id);
      $sql = $db->query($request);
      $informations['delete'] = "<div class='alert alert-danger center'>  $image supprimée du dossier et fiche avec le nom $title supprimée de la base de données</div>\n
      <br/>
      <a class='btn btn-primary' href='home.php'>Retour à la liste des photos</a>";
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }
}
?>
<div class="container-fluid text-center">
  <?php
  if (isset($informations['delete'])) {
    echo $informations['delete'];
  }
  if (isset($errors['id'])) {
    echo $errors['id'];
  }
  ?>
</div>
<?php include('../include/footer.php');?>
