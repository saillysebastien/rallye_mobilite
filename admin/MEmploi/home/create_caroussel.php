<?php
include('../include/header.php');
$title = '';
$done = false;
$text = '';
?>

  <div class="container create_home">
    <legend>Création pour la rubrique accueil (photos et commentaires)</legend><br />
    <form  action="upload.php" method="post" enctype="multipart/form-data" class="home">
      <div class="form-group">
        <label class="col-2" for="title">Lieu de la visite</label>
        <input type="text" placeholder="Uniquement le lieu exemple: Arvato" class="col-6" name="title" id="title" value="<?= htmlentities($title) ?>" />
      </div>
      <div class="form-group">
        <label class="col-2" for="text">Date de la visite</label>
        <input class="col-6" type="text" name="text" placeholder="Uniquement la date exemple: Février 2017" id="text" value="<?= htmlentities($text) ?>" />
      </div>
      <div class="form-check">
        <label class="form-check-label col-12">
          <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'cheched'; } ?> />
          Cochez ici si vous voulez l'afficher sur la page accueil
        </label>
      </div>
      <div class="form-group">
        <label for="image">Image à télécharger pour la page d'accueil</label>
        <input type="file" name="image" class="form-control-file" id='image' required="" />
      </div>
      <button type="submit" name="upload" class="btn btn-primary">Valider</button>
    </form>

  </div>

<?php
include('../include/footer.php');
?>
