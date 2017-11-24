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
$qrcode = "";

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

  $update = sprintf("UPDATE appli SET title='gpe3pg4', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image', qrcode='$qrcode' WHERE id='24'");
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

  $update = sprintf("UPDATE appli SET title='gpe3pg4', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image', qrcode='$qrcode' WHERE id='24'");
  $update_db = mysqli_query($db, $update);
}

if (isset($_POST['upload_quizz'])) {
  $sql = sprintf("SELECT * FROM who WHERE id=%s", $_GET['id']);
  $query = $db->query($sql);
  $result = $query->fetch_assoc();

  $name = $result['title'];
  $question = $result['question'];
  $index = $result['indice'];
  $response = $result['response'];

  $update = sprintf("UPDATE appli SET title='gpe3pg4', name='$name', one='$one', two='$two', three='$three', four='$four', five='$five', indice='$index', response='$response', question ='$question', my_all='$my_all', image='$image', qrcode='$qrcode' WHERE id='24'");
  $update_db = mysqli_query($db, $update);
}

if ($update_db) {
  printf('
  <div class="container text-center">
    <a class="btn btn-info" href="steps5.php">Passer à l\'étape 2</a>
  </div>
  ');
}
include("../include/footer.php");
