<?php
include('../include/header.php');

$errors = [];
$infos = [];

$valid = false;

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] == 1) {
  $valid = true;
} else {
  array_push($errors, "Vous ne pouvez pas vider le groupe 1");
}

if ($valid) {

}
include('../include/footer.php');
 ?>
