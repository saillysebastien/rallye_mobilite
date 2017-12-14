<?php include('../include/header.php');?>

<div class = 'container-fluid text-center'>
  <legend>Liste des explications pour la page application</legend>
  <p>Attention à bien mettre les identifiants de vos phrases dans l'ordre croissant, plus l'identifiant (l'id) est haut plus la phrase sera basse dans le texte.</p>
  <table class = 'table table-bordered table-striped'>
    <thead>
      <tr>
        <td class = 'col-1'> Id </td>
        <td class = 'col-8'> Texte </td>
        <td class = 'col-1'> Affiché </td>
        <td class = 'col-1'> Action</td>
      </tr>
    </thead>
    <tbody>
<?php
$sql = $db->query("SELECT * FROM appli_explication");

while ($row = $sql->fetch_assoc()) {
  if ($row['done'] === "1") {
    $row['done'] =  "Actif";
  } else {
    $row['done'] = "Inactif";
  }

  printf("
  <tr>
  <td class = 'col-1'>%s</td>
  <td class = 'col-8'>%s</td>
  <td class = 'col-1'>%s</td>
  <td class = 'col-2'><div class='btn-group'><a class='btn btn-success' href='change_explication_appli.php?id=%s'>Modifier</a>
  <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cette explication ?&quot;);' href='delete_explication_appli.php?id=%s'>Supprimer</a></div></td>"
  , $row['id']
  , $row['text']
  , $row['done']
  , $row['id']
  , $row['id']);
}

 ?>
</div>
