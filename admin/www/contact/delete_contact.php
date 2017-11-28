<?php
include('../include/header.php');

$errors = [];
$infos = [];

$valid = true;
$id = null;
$title = '';

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier un contact à supprimer !");
}
if ($valid) {
  $sql = sprintf("SELECT * FROM contact WHERE id=%s", $_GET["id"]);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();
  $title = $result['title'];
  try {
    if ($result) {
      $request = sprintf("DELETE FROM contact WHERE id ='%s'", $id);
      $sql = $db->query($request);
      array_push($infos, "Le contact $title a été supprimé.");
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
<?php include('../include/footer.php');?>
