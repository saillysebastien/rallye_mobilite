<?php
include("../include/header_app.php");
require('../config/connect.php');

$indice = "";
$errors = [];
$infos = [];
$access = false;

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
$response_app ="";
$image = "";
$qrcode = "";

$sql = sprintf("SELECT * FROM appli WHERE id=1");
$query = $db->query($sql);
$result = $query->fetch_assoc();

$name = $result['name'];
$question = $result["question"];
$one = $result["one"];
$two = $result["two"];
$three = $result["three"];
$four = $result["four"];
$five = $result["five"];
$my_all = $result["my_all"];
$index = $result["indice"];
$response = $result["response"];
$image = $result["image"];

if (isset($_POST["submit"])) {
  $response_app = strtolower($_POST["response_app"]);
  if ($response === $response_app) {
    $response = ucfirst($response);
    array_push($infos, "Bravo ! vous avez trouvé la réponse au rébus qui était $response.");
  } else {
    array_push($errors, "La réponse que vous avez donné est inexacte !");
    if (!empty($index)) {
      $indice = "<div class='alert alert-success col-12 text-center' id='indice' type='alert'><span class='underline'>Indice :</span>" . $index . ".</div>";
    }
  }
}
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <?php
      include("errors.php");
      include("infos.php");
      ?>
    </div>
    <?php
    if (empty($question) && !empty($my_all)) {
      $access = true;
      printf('<h2 id="first_element">REBUS</h2>');
      if (!empty($one)) {
        printf('
        <div class="col-12 text-left marg_my_all">Mon premier est '. $one .'.</div>
        ');
      }
      if (empty($three)) {
        printf('
        <div class="col-12 text-left marg_my_all">Mon second est '. $two .'.</div>
        ');
      } elseif (!empty($three) && empty($four)) {
        printf('
        <div class="col-12 text-left marg_my_all">Mon deuxième est '. $two .'.</div>
        <div class="col-12 text-left marg_my_all">Mon dernier est '. $three .'.</div>
        ');
      }
      if(!empty($four) && empty($five)) {
        printf('
        <div class="col-12 text-left marg_my_all">Mon troisième est '. $three .'</div>
        <div class="col-12 text-left marg_my_all">Mon dernier est '. $four .'</div>
        ');
      }
      if(!empty($five)) {
        printf('
        <div class="col-12 text-left marg_my_all">Mon quatrième est '. $four .'.</div>
        <div class="col-12 text-left marg_my_all">Mon dernier est '. $five .'.</div>
        ');
      }
      printf('
      <br />
      <div class="col-12 text-left marg_my_all">Mon tout est '. $my_all .'.</div>
      ');
      if (isset($indice)) {
        echo $indice;
      }
      printf('
      <form class="form-inline col-12" method="post" enctype="multipart/form-data" target="_parent">
      <label class="col-4" for="response_app">Que suis je ?</label>
      ');
    }

    if (empty($one)) {
      if (empty($image)) {
        if (!empty($question)) {
          $access = true;
          printf('<h2 id="first_element">QUIZZ</h2>');
          if (isset($indice)) {
            echo $indice;
          }
          printf('
          <div class="col-12"> Question : '. $question .'</div>
          ');
          printf('
          <form class="form-inline col-12" method="post" enctype="multipart/form-data" target="_parent">
          <label class="col-4" for="response_app"><span class="underline">Réponse :</span></label>
          ');
        }
      }
    }

    if (empty($one)) {
      if (!empty($image && !empty($question))) {
        $access = true;
        printf('<div class="col-12"><img class="img img-fluid" id="img_who" src="../admin/application/questionnaire/images/'.$image.'" /></div>');
        if (isset($indice)) {
          echo $indice;
        }
        printf('<div class="col-12 text-center" id="question_who"><span class="underline">Question :</span>'. $question .'</div>');
        printf('
        <form class="form-inline col-12" method="post" enctype="multipart/form-data" target="_parent">
        <label class="col-4" for="response_app" id="response_who"><span class="underline">Réponse :</span></label>
        ');
      }
    }

    if ($access) {
      printf('
      <input class="col-8" type="text" name="response_app" />
      <button id="submit_app" type="submit" class="btn btn-info" name="submit">Valider</button>
      ');
    } else {
      printf('
      <div class="alert alert-danger text-center" type="alert" id="error_page"><div id="error_page_margin"><br />La page que vous avez demandé n\'est pas disponible ou n\'a pas été configuré pour ce rallye. <br /><br /><a href="../index.php" type="button" class="btn btn-info">Retour au site</a><br /><br /></div></div>
      ');
    }
    ?>
  </form>
</div>
</div>

<?php include("../include/footer_app.php");
