<?php
include('../include/header.php');
?>
<div class='container text-center'>
  <div class='row justify-content-center'>
    <h1>Liste des CONTACTS</h1>
    <table class = 'table table-bordered table-striped'>
      <thead>
        <tr class="col-12">
          <td class = 'col-1'> Id </td>
          <td class = 'col-2'> Nom </td>
          <td class = 'col-2'> Adresse </td>
          <td class = 'col-1'> Président </td>
          <td class = 'col-1'> Directeur </td>
          <td class = 'col-1'> Directeur adjoint </td>
          <td class = 'col-1'> Téléphone </td>
          <td class = 'col-1'> Mail </td>
          <td class = 'col-1'> Affiché </td>
          <td class = 'col-1'> Action </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = $db->query("SELECT * FROM contact ORDER BY id");
        while($row = $sql->fetch_assoc()){
          if ($row['done'] === "1") {
            $row['done'] =  "Actif";
          } else {
            $row['done'] = "Inactif";
          }
          printf("
          <tr>
          <td class = 'col-1'> %d </td>
          <td class = 'col-2'> %s </td>
          <td class = 'col-2'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> %s </td>
          <td class = 'col-1'> <a class='btn btn-success' href='change_contact.php?id=%s'>Modifier</a>
          <a class='btn btn-danger' onclick='return window.confirm(&quot;Voulez vraiment supprimer cet élément ?&quot;);' href='delete_contact.php?id=%s'>Supprimer</a> </td>
          </tr>"
          , $row['id']
          , $row['title']
          , $row['adresse']
          , $row['president']
          , $row['director']
          , $row['vice_director']
          , $row['phone']
          , $row['mail']
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
