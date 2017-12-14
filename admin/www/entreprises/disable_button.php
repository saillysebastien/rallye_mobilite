<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] != 0) {
  $id = $_GET['id'];
} else {
  $valid = false;
  array_push($errors, "Vous devez spécifier une entreprise à supprimer !");
}
if ($valid) {
  $sql = sprintf("SELECT * FROM button_enterprise WHERE id=%s", $_GET["id"]);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();
  $name = $result['name'];
  $request = sprintf("UPDATE button_enterprise SET id='$id', name='$name', done='$done' WHERE id=%s",$_GET['id']);
  $valid_sql = $db->query($request);
  array_push($infos, "La catégorie $name a été désactivé.");
}
?>
<div class="container-fluid text-center">
  <?php
  include('../infos.php');
  include('../errors.php');
  ?>
</div>
<?php include('../include/footer.php');
