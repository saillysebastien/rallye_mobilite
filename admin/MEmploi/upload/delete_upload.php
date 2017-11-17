<?php
include('../include/header.php');

$errors = [];
$infos = [];
$id = null;
$valid = true;
$image = null;

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier une image à supprimer");
}
if ($valid) {
  $sql = sprintf("SELECT * FROM upload WHERE id=%s", $_GET["id"]);
  $result = $db->query($sql);
  $infos= $result->fetch_assoc();
  $image = $infos['image'];
  try {
    $delete = unlink ("../images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM upload WHERE id ='%s'", $id);
      $sql = $db->query($request);
      array_push($infos, "L'image $image supprimée du dossier et supprimée de la base de données");
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }
}
?>
<div class="container-fluid text-center">
  <?php
  include("../infos.php");
  include("../errors.php");
  ?>
</div>
<?php
include('../include/footer.php');
?>
