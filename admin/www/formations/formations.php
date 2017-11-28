<?php

include('../include/header.php');

$sql = $db->query("SELECT * FROM formations ORDER BY title");

printf("
<div class='container-fluid  text-center'>
<div class='row justify-content-center'>
<legend>Liste des organismes de formations</legend>
<table class = 'table table-bordered table-striped'>
<thead>
<tr>
<td class = 'col-1'> Id </td>
<td class = 'col-1'> Logo </td>
<td class = 'col-1'> Nom </td>
<td class = 'col-2'> Adresse </td>
<td class = 'col-1'> Contact </td>
<td class = 'col-1'> Téléphone </td>
<td class = 'col-2'> Mail </td>
<td class = 'col-1'> Site web </td>
<td class = 'col-1'> Affiché </td>
<td class = 'col-1'> Action </td>
</tr>
<tbody>
");
while($row = $sql->fetch_assoc()){
  if ($row['done'] === "1") {
    $row['done'] =  "Actif";
  } else {
    $row['done'] = "Inactif";
  }
  printf("
  <td class = 'col-1'> %d </td>
  <td class = 'col-1' style='height:60px; width:60px;'><img class = 'img img-fluid' src = '../images/%s'></td>
  <td class = 'col-1'> %s </td>
  <td class = 'col-2'> %s %s %d %s</td>
  <td class = 'col-1'> %s </td>
  <td class = 'col-1'> %s </td>
  <td class = 'col-2'> %s </td>
  <td class = 'col-1'> %s </td>
  <td class = 'col-1'> %s </td>
  <td class = 'col-1'><a class='btn btn-success' href='change_formations.php?id=%s'>Modifier</a>
  <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_formations.php?id=%s'>Supprimer</a></td>
  </tr>"
  , $row['id']
  , $row['image']
  , $row['title']
  , $row['number_street']
  , $row['street']
  , $row['postal_code']
  , $row['city']
  , $row['contact']
  , $row['phone']
  , $row['mail']
  , $row['web']
  , $row['done']
  , $row['id']
  , $row['id']
);
}
?>
</tbody>
</div>
</div>
<?php
include('../include/footer.php');
?>
