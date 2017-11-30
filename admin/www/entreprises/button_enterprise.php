<?php
include('../include/header.php');
?>
<div class='container-fluid text-center'>
  <div class='row justify-content-center' id="table_enterprise">
    <legend>Liste des Boutons pour montrer les entreprises</legend>
    <table class = 'table table-bordered table-striped'>
      <thead>
        <tr>
          <td class = 'col-2'> Id </td>
          <td class = 'col-3'> Name </td>
          <td class = 'col-2'> Affiché </td>
          <td class = 'col-3'> Action </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = $db->query("SELECT * FROM button_enterprise");
        while($row = $sql->fetch_assoc()){
          if ($row['done'] === "1") {
            $row['done'] =  "Actif";
          } else {
            $row['done'] = "Inactif";
          }
          printf("
          <td class = 'col-2'> %d </td>
          <td class = 'col-5'> %s </td>
          <td class = 'col-2'> %s </td>
          <td class = 'col-3'>
          <div class='btn-group'>
          <a class='btn btn-info' onclick='return window.confirm(&quot;Voulez vraiment activer cet élément ?&quot;);' href='active_button.php?id=%s'>Activer</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment désactiver cet élément ?&quot;);' href='disable_button.php?id=%s'>Désactiver</a>
          </div>
          </td>
          </tr>"
          , $row['id']
          , $row['name']
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
