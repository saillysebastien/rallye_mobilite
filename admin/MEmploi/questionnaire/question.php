<?php
include('../include/header.php');
require('../../../config/connect.php');
$three = '';
$four = '';
$five = '';
?>
<div class="container-fluid text-center">
  <h1>Listes des questions pour l'application</h1>
  <div class="btn-group">
    <button id="filter_puzzle" class="btn btn-info">Liste des rébus</button>
    <button id="filter_who" class="btn btn-dark">Liste des Qui est-ce?</button>
    <button id="filter_quizz" class="btn btn-info">Liste des quizz</button>
  </div>

  <div id="puzzle" style="display:none;"><br />
    <div class="row justify-content-center">
      <?php
      $sql = $db->query("SELECT * FROM rebus ORDER BY id");
      while($row = $sql->fetch_assoc()) {
        if (empty($row['indice'])) {
          $row['indice'] = "Aucun indice.";
        }

        if (empty($row['three'])) {
          $three = "style='display:none;'";
        } else {
          $three = "";
        }
        if (empty($row['four'])) {
          $four = "style='display:none;'";
        } else {
          $four = "";
        }
        if (empty($row['five'])) {
          $five = "style='display:none;'";
        } else {
          $five = "";
        }

        printf('
        <br />
        <div class="col-4 text-left">
        <div class="card">
        <h5 class="card-header bg-dark text-white">Titre du rébus: %s
        <div class="float-right small">
        <a class="btn btn-raised btn-success"  data-placement="top" title="id">id: %d</a>
        </div>
        </h5>
        <div class="card-body">
        <div class="row justify-content-center">
        <div class="alert alert-primary row col-12">
        <div class="col-4">Partie 1 :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12">
        <div class="col-4">Partie 2 :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12" %s>
        <div class="col-4">Partie 3 :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12" %s>
        <div class="col-4">Partie 4 :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12" %s>
        <div class="col-4">Partie 5 :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12">
        <div class="col-4">Indice :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12">
        <div class="col-4">Mon tout est </div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12">
        <div class="col-4">Réponse :</div>
        <div class="col-8">%s</div>
        </div>
        <div class ="btn-group">
        <a class="btn btn-success" href="change_rebus.php?id=%s">Modifier</a>
        <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="delete_rebus.php?id=%s">Supprimer</a>
        </div>
        </div>
        </div>
        </div>
        </div>'
        , $row['name']
        , $row['id']
        , $row['one']
        , $row['two']
        , $three
        , $row['three']
        , $four
        , $row['four']
        , $five
        , $row['five']
        , $row['indice']
        , $row['my_all']
        , $row['response']
        , $row['id']
        , $row['id']
      );
    }
    ?>
  </div>
</div>

<div id="who" style="display:none;"><br />
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM who");
    while($row = $sql->fetch_assoc()) {
      if (empty($row['indice'])) {
        $row['indice'] = "Aucun indice.";
      }

      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="card-header bg-dark text-white"><img src="images/%s" class="img img-fluid" alt="logo %s"/>
      <div class="float-right small">
      <a class="btn btn-raised btn-success"  data-placement="top" title="id">Id: %d</a>
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Titre du Qui est-ce? :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Question :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Indice :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Réponse :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="change_who.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="delete_who.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["title"]
      , $row["question"]
      , $row["indice"]
      , $row["response"]
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>

<div id="quizz" style="display:none;"><br />
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM quizz ORDER BY id");
    while($row = $sql->fetch_assoc()) {
      if (empty($row['indice'])) {
        $row['indice'] = "Aucun indice.";
      }

      printf('
      <br />
      <div class="col-4 text-left">
      <div class="card">
      <h5 class="card-header bg-dark text-white">Titre du quizz: %s
      <div class="float-right small">
      <a class="btn btn-raised btn-success"  data-placement="top" title="id">id: %d</a>
      </div>
      </h5>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Question :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Indice :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Réponse :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="change_quizz.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="delete_quizz.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row['title']
      , $row['id']
      , $row['question']
      , $row['indice']
      , $row['response']
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>
</div>

<?php
include('../include/footer.php');
?>

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
