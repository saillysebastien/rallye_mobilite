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

?>

<div class="container text-center">
  <h1>Quel questionnaire voulez vous intégrer pour l'étape 1 ?</h1>
  <div class="btn-group">
    <button id="filter_puzzle" class="btn btn-info">Un rébus ?</button>
    <button id="filter_who" class="btn btn-dark">Un quizz Qui est-ce?</button>
    <button id="filter_quizz" class="btn btn-info">Un quizz ?</button>
  </div>

  <div id="puzzle" style="display: none;">
    <br/><h2>Sélectionnez votre rébus</h2><br />
    <?php
    $sql = $db->query("SELECT * FROM rebus");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="row text-center">
      <div class="col-12">
      <form class="form-inline" action="update_p1.php?id=%s" method="post" enctype="multipart/form-data">
      <div class="form-group col-6">Quizz du nom de %s</div>
      <div class="form-group col-4">
      <button name="upload_rebus" type="submit" class="btn btn-primary text-center">Sélectionner</button>
      </div>
      </form>
      </div>
      </div><br />'
      , $row['id']
      , $row['name']);
    }
    ?>
  </div>

  <div id="who" style="display: none;">
    <br/><h2>Sélectionnez votre quizz qui est-ce ?</h2><br />
    <?php
    $sql = $db->query("SELECT * FROM who");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="row text-center">
      <div class="col-12">
      <form class="form-inline" action="update_p1.php?id=%s" method="post" enctype="multipart/form-data">
      <div class="form-group col-6">Quizz du nom de %s</div>
      <div class="form-group col-4">
      <button name="upload_who" type="submit" class="btn btn-primary text-center">Sélectionner</button>
      </div>
      </form>
      </div>
      </div><br />'
      , $row['id']
      , $row['title']);
    }
    ?>
  </div>

  <div id="quizz" style="display: none;">
    <br/><h2>Sélectionnez votre quizz</h2><br />
    <?php
    $sql = $db->query("SELECT * FROM quizz");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="row text-center">
      <div class="col-12">
      <form class="form-inline" action="update_p1.php?id=%s" method="post" enctype="multipart/form-data">
      <div class="form-group col-6">Quizz du nom de %s</div>
      <div class="form-group col-4">
      <button name="upload_quizz" type="submit" class="btn btn-primary text-center">Sélectionner</button>
      </div>
      </form>
      </div>
      </div><br />'
      , $row['id']
      , $row['title']);
    }
    ?>
  </div>
</div>

<?php include("../include/footer.php"); ?>

<script>
$("#filter_puzzle").click(function() {
  $("#who").css("display", "none");
  $("#quizz").css("display", "none");
  $("#puzzle").show();
});

$("#filter_who").click(function() {
  $("#puzzle").css("display", "none");
  $("#quizz").css("display", "none");
  $("#who").show();
});

$("#filter_quizz").click(function() {
  $("#who").css("display", "none");
  $("#puzzle").css("display", "none");
  $("#quizz").show();
});
</script>
