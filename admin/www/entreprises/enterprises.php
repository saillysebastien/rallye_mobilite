<?php
include('../include/header.php');
?>
<div class='container-fluid text-center'>
  <div class='row justify-content-center'>
    <h1>Liste des ENTREPRISES par domaine d'activité</h1>
    <table class = 'table table-bordered table-striped'>
      <thead>
        <tr>
          <td class = 'col-1'> Id </td>
          <td class = 'col-1'> Domaine d'activité </td>
          <td class = 'col-1'> Logo </td>
          <!-- <td class = 'col-1'> Nom </td> -->
          <td class = 'col-1'> Adresse </td>
          <td class = 'col-1'> Secteur d'activité </td>
          <td class = 'col-1'> Contact </td>
          <td class = 'col-1'> Téléphone </td>
          <td class = 'col-1'> Mail </td>
          <td class = 'col-1'> Site web </td>
          <td class = 'col-1'> Affiché </td>
          <td class = 'col-1'> Action </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = $db->query("SELECT * FROM entreprises ORDER BY domain_activity");
        while($row = $sql->fetch_assoc()){
          if ($row['done'] === "1") {
            $row['done'] =  "Actif";
          } else {
            $row['done'] = "Inactif";
          }
          printf("
          <td class = 'col-1'> %d </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'><img class = 'img img-fluid' src = '../images/%s'></td>
          <td class = 'col-1'> %s %s %d %s</td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'><a class='btn btn-success' href='change_enterprises.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_enterprises.php?id=%s'>Supprimer</a></td>
          </tr>"
          , $row['id']
          , $row['domain_activity']
          , $row['image']
          // , $row['title']
          , $row['number_street']
          , $row['street']
          , $row['postal_code']
          , $row['city']
          , $row['activity']
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
