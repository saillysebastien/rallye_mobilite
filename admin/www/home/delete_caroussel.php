<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier une photo à supprimer !");
}
if ($valid) {
  $sql = sprintf("SELECT * FROM home WHERE id=%s", $_GET["id"]);
  $query = $db->query($sql);
  $result= $query->fetch_assoc();
  $image = $result['image'];
  $title = $result['title'];
  try {
    $delete = unlink ("../images/$image");
    if ($delete) {
      $request = sprintf("DELETE FROM home WHERE id ='%s'", $id);
      $sql = $db->query($request);
      array_push($infos, "L'image $image a été supprimée et la fiche $title supprimée de la base de donnée.");
    }
  } catch (Exception $e) {
    header('Location: error500.html', true, 302);
    exit();
  }
}
?>
<div class="container-fluid text-center">
  <?php
  include("../../infos.php");
  include("../../errors.php");
  ?>
</div>
<?php include('../include/footer.php');
