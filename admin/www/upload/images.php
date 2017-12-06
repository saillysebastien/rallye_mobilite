<?php include('../include/header.php');?>

<div class="container-fluid text-center">
  <div class="row justify-content-center">
    <legend>Listes des images par lieu d'affichage</legend>
    <div class="btn-group">
      <button id="filter_home" class="btn btn-info">Page "Accueil"</button>
      <button id="filter_enterprises" class="btn btn-dark">Page "Entreprises"</button>
      <button id="filter_formations" class="btn btn-info">Page "Formations"</button>
      <button id="filter_application" class="btn btn-dark">Page "Application"</button>
      <button id="filter_anyplace" class="btn btn-info">Dans aucune page</button>
    </div>
  </div>

  <div id="home" style="display:none;" class="animated slideInLeft"><br />
    <div>
      <legend>ATTENTION</legend>
      Ne pas supprimer l'id numéro 1 sous peine de voir disparaitre le caroussel de photos.<br />
      Si vous modifiez l'id numéro 1 pour qu'il apparaisse plus loin ou plus tard n'oubliez pas d'en mettre un autre sur cet identifiant.<br />
    </div>
    <div class="row justify-content-center">
      <?php
      $sql = $db->query("SELECT * FROM home ORDER BY id");
      while($row = $sql->fetch_assoc()) {
        printf('
        <div class="col-4 text-left">
        <div class="card">
        <h4 class="card-header bg-dark text-white"><img src="../images/%s" class="img-thumbnail" alt="logo %s"/>
        <div class="float-right small">
        </div>
        </h4>
        <div class="card-body">
        <div class="row justify-content-center">
        <div class="alert alert-primary row col-12">
        <div class="col-4">Id de la photo :</div>
        <div class="col-8">%s</div>
        </div>
        <div class="alert alert-primary row col-12">
        <div class="col-4">Nom de la photo :</div>
        <div class="col-8">%s</div>
        </div>
        <div class ="btn-group">
        <a class="btn btn-success" href="../home/change_caroussel.php?id=%s">Modifier</a>
        <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="../home/delete_caroussel.php?id=%s">Supprimer</a>
        </div>
        </div>
        </div>
        </div>
        </div>'
        , $row["image"]
        , $row["image"]
        , $row["id"]
        , $row["image"]
        , $row["id"]
        , $row["id"]
      );
    }
    ?>
    <legend>Listes des images dans "explications"</legend>
    <?php
    $sql2 = $db->query("SELECT * FROM explication");
    while($row = $sql2->fetch_assoc()) {
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="bg-dark text-white"><img src="../images/%s" class="img img-fluid" alt="logo %s">
      <div class="float-right small">
      <a class="btn btn-raised btn-success"  data-placement="top" title="Identifiant">Id: %d</a>
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Titre :</div>
      <div class="col-8">%s</div>
      <div class ="btn-group">
      <a class="btn btn-success" href="../home/change-explication.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="../home/delete_explication.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["title"]
      , $row["id"]
      , $row["id"]
    );
  }
    ?>
  </div>
</div>

<div id="enterprises" style="display:none;" class="animated slideInLeft"><br />
  <div>
    <legend>Images des entreprises</legend>
  </div>
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM entreprises ORDER BY domain_activity");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="card-header bg-dark text-white text-center"><img src="../images/%s" class="img-thumbnail" alt="logo %s"/>
      <div class="float-right small">
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Id de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Domaine d\'activité :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Nom de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="../entreprises/change_enterprises.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="../entreprises/delete_enterprises.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row['domain_activity']
      , $row["image"]
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>

<div id="formations" style="display:none;" class="animated slideInLeft"><br />
  <div>
    <legend>Images des formations</legend>
  </div>
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM formations ORDER BY id");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="card-header bg-dark text-white text-center"><img src="../images/%s" class="img-thumbnail" alt="logo %s"/>
      <div class="float-right small">
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Id de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Nom de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="../formations/change_formations.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="../formations/delete_formations.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["image"]
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>

<div id="application" style="display:none;" class="animated slideInLeft"><br />
  <div>
    <legend>Images dans l'application</legend>
  </div>
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM who ORDER BY id");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="card-header bg-dark text-white text-center"><img src="../../application/questionnaire/images/%s" class="img-thumbnail" alt="logo %s"/>
      <div class="float-right small">
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Id de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Nom de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-success" href="../../application/questionnaire/change_who.php?id=%s">Modifier</a>
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer ce rébus ?&quot;);" href="../../application/questionnaire/delete_who.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["image"]
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>

<div id="anyplace" style="display:none;" class="animated slideInLeft"><br />
  <div>
    <legend>Images dans aucune rubrique</legend>
  </div>
  <div class="row justify-content-center">
    <?php
    $sql = $db->query("SELECT * FROM upload ORDER BY id");
    while($row = $sql->fetch_assoc()) {
      printf('
      <div class="col-4 text-left">
      <div class="card">
      <h4 class="card-header bg-dark text-white text-center"><img src="../images/%s" class="img-thumbnail" alt="logo %s"/>
      <div class="float-right small">
      </div>
      </h4>
      <div class="card-body">
      <div class="row justify-content-center">
      <div class="alert alert-primary row col-12">
      <div class="col-4">Id de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class="alert alert-primary row col-12">
      <div class="col-4">Nom de la photo :</div>
      <div class="col-8">%s</div>
      </div>
      <div class ="btn-group">
      <a class="btn btn-danger" onclick="return window.confirm(&quot;Voulez vraiment supprimer cette image ?&quot;);" href="../upload/delete_upload.php?id=%s">Supprimer</a>
      </div>
      </div>
      </div>
      </div>
      </div>'
      , $row["image"]
      , $row["image"]
      , $row["id"]
      , $row["image"]
      , $row["id"]
      , $row["id"]
    );
  }
  ?>
</div>
</div>
</div>
<?php include('../include/footer.php');?>

<script>
$("#filter_home").click(function() {
  $("#enterprises").css("display", "none");
  $("#formations").css("display", "none");
  $("#anyplace").css("display", "none");
  $("#application").css("display", "none");
  $("#home").show();
});

$("#filter_enterprises").click(function() {
  $("#home").css("display", "none");
  $("#formations").css("display", "none");
  $("#anyplace").css("display", "none");
  $("#application").css("display", "none");
  $("#enterprises").show();
});

$("#filter_formations").click(function() {
  $("#home").css("display", "none");
  $("#enterprises").css("display", "none");
  $("#anyplace").css("display", "none");
  $("#application").css("display", "none");
  $("#formations").show();
});

$("#filter_application").click(function() {
  $("#home").css("display", "none");
  $("#enterprises").css("display", "none");
  $("#anyplace").css("display", "none");
  $("#formations").css("display", "none");
  $("#application").show();
});

$("#filter_anyplace").click(function() {
  $("#home").css("display", "none");
  $("#enterprises").css("display", "none");
  $("#application").css("display", "none");
  $("#formations").css("display", "none");
  $("#anyplace").show();
});
</script>
