<?php
include('../include/header.php');
?>
<div class='container-fluid text-center'>
  <div class='row justify-content-center'>
    <legend>Liste des MOYENS DE TRANSPORT</legend>
    <legend> Première image affichée (identifiant doit être égale à 1)</legend><br />
    <table class = 'table table-bordered table-striped'>
      <thead>
        <tr>
          <td class = 'col-1'> Id </td>
          <td class = 'col-3'> Image </td>
          <td class = 'col-1'> Titre </td>
          <td class = 'col-3'> Site web </td>
          <td class = 'col-1'> Affiché </td>
          <td class = 'col-2'> Action </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = $db->query("SELECT * FROM mobility WHERE id = 1");
        while($row = $sql->fetch_assoc()){
          if ($row['done'] === "1") {
            $row['done'] =  "Actif";
          } else {
            $row['done'] = "Inactif";
          }
          printf("
          <td class = 'col-1'> %d </td>
          <td class = 'col-3'><img class = 'img img-fluid' src = '../images/%s'></td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-3'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-2'><a class='btn btn-success' href='change_mobility.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_mobility.php?id=%s'>Supprimer</a></td>
          </tr>"
          , $row['id']
          , $row['image']
          , $row['title']
          , $row['web']
          , $row['done']
          , $row['id']
          , $row['id']
        );
      }
      ?>
    </tbody>
  </table>
      <legend> Dernière image affichée (identifiant doit être égale à 2)</legend>
      <table class = 'table table-bordered table-striped'>
        <thead>
          <tr>
            <td class = 'col-1'> Id </td>
            <td class = 'col-3'> Image </td>
            <td class = 'col-1'> Titre </td>
            <td class = 'col-3'> Site web </td>
            <td class = 'col-1'> Affiché </td>
            <td class = 'col-2'> Action </td>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql2 = $db->query("SELECT * FROM mobility WHERE id = 2");
          while($row = $sql2->fetch_assoc()){
            if ($row['done'] === "1") {
              $row['done'] =  "Actif";
            } else {
              $row['done'] = "Inactif";
            }
            printf("
            <td class = 'col-1'> %d </td>
            <td class = 'col-3'><img class = 'img img-fluid' src = '../images/%s'></td>
            <td class = 'col-1'> %s </td>
            <td class = 'col-3'> %s </td>
            <td class = 'col-1'> %s </td>
            <td class = 'col-2'><a class='btn btn-success' href='change_mobility.php?id=%s'>Modifier</a>
            <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_mobility.php?id=%s'>Supprimer</a></td>
            </tr>"
            , $row['id']
            , $row['image']
            , $row['title']
            , $row['web']
            , $row['done']
            , $row['id']
            , $row['id']
          );
        }
        ?>
      </tbody>
    </table>
        <legend> Images au moyen affichées</legend>
        <table class = 'table table-bordered table-striped'>
          <thead>
            <tr>
              <td class = 'col-1'> Id </td>
              <td class = 'col-3'> Image </td>
              <td class = 'col-1'> Titre </td>
              <td class = 'col-3'> Site web </td>
              <td class = 'col-1'> Affiché </td>
              <td class = 'col-2'> Action </td>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql3 = $db->query("SELECT * FROM mobility WHERE id != 1 AND id!= 2");
            while($row = $sql3->fetch_assoc()){
              if ($row['done'] === "1") {
                $row['done'] =  "Actif";
              } else {
                $row['done'] = "Inactif";
              }
              printf("
              <td class = 'col-1'> %d </td>
              <td class = 'col-3'><img class = 'img img-fluid' src = '../images/%s'></td>
              <td class = 'col-1'> %s </td>
              <td class = 'col-3'> %s </td>
              <td class = 'col-1'> %s </td>
              <td class = 'col-2'><a class='btn btn-success' href='change_mobility.php?id=%s'>Modifier</a>
              <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_mobility.php?id=%s'>Supprimer</a></td>
              </tr>"
              , $row['id']
              , $row['image']
              , $row['title']
              , $row['web']
              , $row['done']
              , $row['id']
              , $row['id']
            );
          }
          ?>
        </tbody>
      </table>
      </div>
    </div>
    <?php include('../include/footer.php'); ?>
